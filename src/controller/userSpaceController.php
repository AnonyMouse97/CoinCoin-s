<?php

declare(strict_types=1);

// additional require
require_once('utils/sanitize.php');

// model require
require_once('model/usersManager.php');
require_once('model/betsManager.php');
require_once('model/betListManager.php');

class UserSpaceController
{
    function render()
    {
        $view = './view/userSpaceView.php';
        $document = 'My space';

        $sanitize = new Sanitize();
        $users = new UserManager();
        $betDetails = new BetListManager();

        // display user bets
        $userBets = $betDetails->getUserBets($_SESSION['userID']);
        // delete bet on request
        if (isset($_GET['delete']) && ctype_digit($_GET['delete'])) {
            $coins = $betDetails->getAmountBet($_GET['delete'])[0];
            $users->addCoins($_SESSION['userID'], $coins);
            $betDetails->deleteBet($_GET['delete']);
            $_SESSION['userCoins'] = $users->getUserCoins($_SESSION['userID'])[0];
            header('Location:index.php?page=userSpace&mode=bets');
        }
        // update user name & pass
        if (isset($_GET['mode']) && $_GET['mode'] == 'account') {
            $errors = '';
            if (isset($_POST['userName']) && isset($_POST['userPass']) && isset($_POST['confirmPass'])) {
                $userName = $sanitize->sanitize($_POST['userName']);
                $userPass = $sanitize->sanitize($_POST['userPass']);
                $confirmPass = $sanitize->sanitize($_POST['confirmPass']);

                if ($userPass == $confirmPass) {
                    $user = $users->checkUser($userName);
                    if ($user[0] <= '1') {
                        $hashed = password_hash($userPass, PASSWORD_DEFAULT);
                        $users->updateUser($userName, $hashed, $_SESSION['userID']);
                        session_destroy();
                        header('Location: index.php');
                    } else {
                        $errors = 'error';
                    }
                } else {
                    $errors = 'error';
                }
            }
        }

        require $view;
    }
}
