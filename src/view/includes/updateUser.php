<section class="updateUserForm">
    <form action="" method="POST">
        <label for="userName">User name :</label>
        <input class="<?= $errors ?>" type="text" name="userName" autocomplete="off" value="<?= $_SESSION['userName'] ?> ">

        <label for="userName">Password :</label>
        <input class="<?= $errors ?>" type="password" name="userPass" autocomplete="off">

        <label for="confirmPass">Confirm password :</label>
        <input class="<?= $errors ?>" type="password" name="confirmPass">

        <input type="submit" value="Update">
    </form>
</section>