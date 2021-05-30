<?php require 'includes/header.php' ?>
<main>
    <aside>
        <nav>
            <ul>
                <li><a href="index.php?page=admin&mode=closeBet">Close Bets</a></li>
                <li><a href="index.php?page=admin&mode=addBet">Add Bet</a></li>
                <li><a href="index.php?page=admin&mode=updateUser">Update user</a></li>
                <li><a href="index.php?page=admin&mode=addUser">Add user</a></li>
            </ul>
        </nav>
    </aside>


    <?php


    if ($_SESSION['admin']) {
        $view = 'includes/betControl.php';
        if (isset($_GET['mode']) && $_GET['mode'] == 'closeBet') {
            $view = 'includes/betControl.php';
        }
        if (isset($_GET['mode']) && $_GET['mode'] == 'addBet') {
            $view = 'includes/addBetView.php';
        }
        if (isset($_GET['mode']) && $_GET['mode'] == 'updateUser') {
            $view = 'includes/userControl.php';
        }
        if (isset($_GET['mode']) && $_GET['mode'] == 'addUser') {
            $view = 'includes/addUserView.php';
        }
        require $view;
    } else {
        header('Location: index.php');
    }
    ?>

</main>



<?php require 'includes/footer.php'; ?>