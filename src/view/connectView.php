<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/content/css/style.css">
    <title>CoinCoin - log in</title>
</head>

<body>
    <div class="footerContent">
        <main>
            <section class="connectForm">
                <h2>Connect</h2>
                <form action="index.php" method="post">

                    <label for="userName">User Name :</label>
                    <input type="text" name="userName" class="<?= $errors ?>">

                    <label for="userPass">Password :</label>
                    <input type="password" name="userPass" class="<?= $errors ?>">

                    <input type="submit" value="Log In">
                </form>
            </section>
        </main>

        <?php include 'includes/footer.php'; ?>