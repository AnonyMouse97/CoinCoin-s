<?php

declare(strict_types=1);

// additional require
require 'utils/sanitize.php';

// model require
require_once('model/usersManager.php');
require_once('model/betsManager.php');
require_once('model/betListManager.php');

class HomeController
{
    function render()
    {

        $view = './view/connectView.php';
        $document = 'Welcome !';

        $errors = '';
        // login
        if (isset($_POST['userName']) && isset($_POST['userPass'])) {
            // sanitize inputs
            $sanitizer = new Sanitize();
            $userName = $sanitizer->sanitize($_POST['userName']);
            $userPass = $sanitizer->sanitize($_POST['userPass']);
            // get user
            $user = new UserManager();
            $getUser = $user->getUser($userName);
            //check if user exists
            $checkUser = $user->checkUser($userName);
            if ($checkUser[0] >= '1') {
                //check pass
                if (password_verify($userPass, $getUser['userPass'])) {
                    // sets session if connects
                    $_SESSION['userID'] = $getUser['userID'];
                    $_SESSION['userName'] = $getUser['userName'];
                    $_SESSION['admin'] = $getUser['admin'];
                    $_SESSION['userCoins'] = $getUser['userCoins'];
                    $_SESSION['auth'] = true;
                    // reload the page
                    header('Location: index.php');
                } else {
                    $errors = 'error';
                }
            } else {
                $errors = 'error';
            }
        }

        // if logged
        if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
            // set default view
            $view = './view/homeView.php';
            // instances classes
            $bets = new BetsManager();
            $betDetails = new BetListManager();
            $user = new UserManager();
            // request the odds (one for the computing, one for display in view)
            $getBets = $bets->getBets();
            $displayBets = $bets->getBets();
            // display bets
            foreach ($getBets as $bet) {
                $choices = explode(',', $bet['betChoices']);
                // for each choice, get the odds (trim is important to keep stings clean)
                foreach ($choices as $choice) {
                    $getOdds = $betDetails->getChoiceOdds($bet['nameID'], trim($choice));
                    $getTotal = $betDetails->getAllOdds($bet['nameID']);
                    // compute the odds + security for 0 division
                    if ($getOdds[0] == 0 || $getTotal[0] == 0) {
                        $odds = 1;
                    } else {
                        $odds = 1 + (($getTotal[0] - $getOdds[0]) / $getTotal[0]);
                    }
                    // create an array with key => choice value => odds
                    ${trim($bet['nameID'])}[$choice] = round($odds, 2);
                }
                // creates an array with choices and odds foreach bet
                ${'odds' . $bet['nameID']} = ${$bet['nameID']};
            }
            // add bets
            if (isset($_POST) && isset($_POST['betCoins']) && isset($_POST['betChoice']) && isset($_POST['betID'])) {
                $sanitizer = new Sanitize();
                $coins = $sanitizer->sanitize($_POST['betCoins']);
                $betID = $sanitizer->sanitize($_POST['betID']);
                $betChoice = $sanitizer->sanitize($_POST['betChoice']);

                //if inputs are correct
                if (($coins > 0 && ctype_digit($coins)) && ctype_digit($betID) && $coins <= $_SESSION['userCoins']) {
                    // create bet
                    $betDetails->newBet($_SESSION['userID'], $betID, $betChoice, $coins);
                    // substract coins from db
                    $user->removeCoins($_SESSION['userID'], $coins);
                    // update coins for session from db
                    $_SESSION['userCoins'] = $user->getUserCoins($_SESSION['userID'])[0];
                    // reload page
                    header('Location: index.php');
                } else {
                    echo '<span class="throwError"></span>';
                }
            }
        }

        // if disconnect
        if (isset($_GET['disconnect'])) {
            session_destroy();
            header('Location: index.php');
        }


        require $view;
    }
}
