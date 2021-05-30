<?php

declare(strict_types=1);

require_once('connectDB.php');

class UserManager extends ConnectDB
{
    // get user for pass
    function getUser($user)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT *
            FROM users
            WHERE userName = :userName");
        $result->execute(['userName' => $user]);
        $user = $result->fetch();

        return $user;
    }
    // get coins for user
    function getUserCoins($id)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT userCoins
            FROM users
            WHERE userID = :id");
        $result->execute(['id' => $id]);
        $user = $result->fetch();

        return $user;
    }
    // check if user exists
    function checkUser($user)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT COUNT(userName)
            FROM users
            WHERE userName = :userName");
        $result->execute(['userName' => $user]);
        $user = $result->fetch();

        return $user;
    }
    // add user
    function addUser($name, $pass)
    {
        $db = $this->connect();

        $result = $db->prepare("INSERT INTO users(userName, userPass, userCoins)
            VALUES (:name, :pass, 1000) ");
        $result->execute([
            'name' => $name,
            'pass' => $pass
        ]);
        $user = $result->fetch();

        return $user;
    }
    // update user name & pass
    function updateUser($name, $pass, $id)
    {
        $db = $this->connect();

        $result = $db->prepare("UPDATE users
        SET userName = :name, userPass = :pass
        WHERE userID = :id");
        $result->execute([
            'name' => $name,
            'pass' => $pass,
            'id' => $id
        ]);
    }

    // remove coins
    function removeCoins($id, $coins)
    {
        $db = $this->connect();

        $result = $db->prepare("UPDATE users
            SET userCoins =  userCoins - :coins
            WHERE userID = :id");
        $result->execute([
            'coins' => $coins,
            'id' => $id
        ]);
    }
    // add coins
    function addCoins($id, $coins)
    {
        $db = $this->connect();

        $result = $db->prepare("UPDATE users
            SET userCoins =  userCoins + :coins
            WHERE userID = :id");
        $result->execute([
            'coins' => $coins,
            'id' => $id
        ]);
    }
}
