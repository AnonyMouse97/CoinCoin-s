<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/content/css/style.css">
    <link rel="icon" href="/content/img/duck.svg" />
    <title>CoinCoin - <?= $document ?></title>
</head>

<body>

    <div class="footerContent">
        <header>


            <div class="header">
                <div class="userCoins">
                    <img src="./content/img/duckCoin.svg" alt="" height="30px">
                    <p><?= $_SESSION['userCoins'] ?></p>
                </div>

                <a href="index.php" class="homeLogo">
                    <img src="./content/img/duckCoin.svg" alt="">
                </a>

                <img class="menuLogo" src="./content/img/menu.svg" alt="">

            </div>

            <nav id="navbar">
                <ul>
                    <li>
                        <a href="index.php?page=userSpace"><img src="./content/img/duck.svg" alt="" height="30px"></a>
                        <p>Hello <b> <?= $_SESSION['userName']; ?> </b> !</p>
                    </li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?page=userSpace">My space</a></li>
                    <li><a href="index.php?page=stats">Server stats</a></li>
                    <li><a href="index.php?disconnect=1">Disconnect</a></li>
                </ul>
            </nav>


        </header>