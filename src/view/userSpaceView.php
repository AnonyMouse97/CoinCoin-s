<?php include 'includes/header.php' ?>

<aside class="userSpaceNav">
    <ul>
        <li><a href="index.php?page=userSpace&mode=bets">My Bets</a></li>
        <li><a href="index.php?page=userSpace&mode=account">My Account</a></li>
    </ul>
</aside>

<?php
if (isset($_SESSION['userName'])) {
    if (isset($_GET['mode']) && $_GET['mode'] == 'account') {
        $view = 'includes/updateUser.php';
    } else {
        $view = 'includes/userBets.php';
    }
} else {
    header('Location: index.php');
}
require $view;
?>

<?php include 'includes/footer.php' ?>