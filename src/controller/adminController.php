<?php

declare(strict_types=1);

//require utils
require_once('utils/sanitize.php');

// model require
require_once('model/usersManager.php');
require_once('model/betsManager.php');
require_once('model/betListManager.php');


class AdminController
{
    function render()
    {
        $view = './view/adminView.php';
        $document = 'Admin';

        //get bets
        $sanitize = new Sanitize();

        $betDetails = new BetListManager();

        $users = new UserManager();

        $bets = new BetsManager();

        $displayBets = $bets->getBets();
        $choicesbets = $bets->getBets();
        $getBets = $bets->getBets();


        foreach ($choicesbets as $bet) {
            $choices = explode(',', $bet['betChoices']);
            ${'choices' . $bet['nameID']} = [];
            foreach ($choices as $choice) {
                array_push(${'choices' . $bet['nameID']}, $choice);
            }
        }

        // close bet automatically if date + values are ok and close link used
        if (isset($_GET['close']) && $_GET['close']) {
            foreach ($getBets as $bet) {
                if (strtotime(date('Y-m-d H:i:s')) > strtotime($bet['betFinalDate']) && $bet['betFinalResult'] != NULL) {
                    $allBets = $betDetails->getAllBets($bet['nameID']);
                    foreach ($allBets as $singleBet) {
                        if ($bet['betFinalResult'] == $singleBet['betListBetChoice']) {
                            // get total won, total lost and user bet
                            $totalWon = $betDetails->getWinning($bet['nameID'], $singleBet['betListBetChoice']);
                            $totalLost = $betDetails->getLosing($bet['nameID'], $singleBet['betListBetChoice']);
                            $userBet = $singleBet['betListCoins'];
                            // compute earnings
                            $earned = $userBet + (($userBet / $totalWon[0]) * $totalLost[0]);
                            $earned = round($earned, 0);
                            // update coins for winner
                            $users->addCoins($singleBet['betListUserID'], $earned);
                        }
                    }
                    // delete betList items that are unused
                    $betDetails->closeBets($bet['nameID']);
                    //$delayed = date('Y-m-d H:i:s', strtotime('+ 3 days', strtotime($$bet['betFinalDate'])));
                }
            }
        }

        // admin router

        // closing bet
        if (isset($_GET['mode']) && $_GET['mode'] == 'closeBet' && $_SESSION['admin']) {
            // update bet before closing it
            if (isset($_POST['choice']) && isset($_POST['betID'])) {
                $bets->closeBet($_POST['choice'], $_POST['betID']);
                header('Location: index.php?page=admin');
            }
        }

        // add user
        if (isset($_GET['mode']) && $_GET['mode'] == 'addUser' && $_SESSION['admin']) {
            if (isset($_POST['userName']) && isset($_POST['userPass']) && isset($_POST['confirmPass'])) {
                $userName = $sanitize->sanitize($_POST['userName']);
                $userPass = $sanitize->sanitize($_POST['userPass']);
                $confirmPass = $sanitize->sanitize($_POST['confirmPass']);

                if ($userPass == $confirmPass) {
                    $user = $users->checkUser($userName);
                    if ($user[0] == '0') {
                        $hashed = password_hash($userPass, PASSWORD_DEFAULT);
                        $users->addUser($userName, $hashed);
                        header('Location: index.php?page=admin&mode=addUser');
                    } else {
                        echo 'User already exist';
                    }
                } else {
                    echo 'Passwords do not match';
                }
            }
        }

        // adding bet
        if (isset($_GET['mode']) && $_GET['mode'] == 'addBet' && $_SESSION['admin']) {
            if (
                isset($_POST['betName']) && isset($_POST['betChoices']) && isset($_POST['date'])
                && isset($_POST['hours'])
            ) {
                $time = $_POST['date'] . ' ' . $_POST['hours'] . ':00:00';
                $bets->addBet($_POST['betName'], $_POST['betChoices'], $time);

                header('Location: index.php?page=admin&mode=addBet');
            }
        }




        require $view;
    }
}
