<?php

declare(strict_types=1);

require_once('connectDB.php');

class BetListManager extends ConnectDB
{
    // get sum of all odds for a choice
    function getAmountBet($bet)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT betListCoins
            FROM betList
            WHERE betListID = :bet ");
        $result->execute(['bet' => $bet]);

        $coins = $result->fetch();

        return $coins;
    }
    // get sum of all odds for a choice
    function getChoiceOdds($bet, $choice)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT SUM(betListCoins)
            FROM betList
            WHERE betListBetID = :bet AND betListBetChoice = :choice");
        $result->execute(['bet' => $bet, 'choice' => $choice]);

        $coins = $result->fetch();

        return $coins;
    }
    // get amount of bets for a choice
    function getAllOdds($bet)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT SUM(betListCoins)
            FROM betList
            WHERE betListBetID = :bet");
        $result->execute(['bet' => $bet]);

        $coins = $result->fetch();

        return $coins;
    }
    // get all bets for a bet
    function getAllBets($bet)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT betListUserID, betListBetID, betListBetChoice, betListCoins
            FROM betList
            WHERE betListBetID = :bet");
        $result->execute(['bet' => $bet]);

        return $result;
    }
    // get sum of winning bets
    function getWinning($id, $choice)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT SUM(betListCoins)
            FROM betList
            WHERE betListBetID = :id AND betListBetChoice = :choice");
        $result->execute([
            'id' => $id,
            'choice' => $choice
        ]);

        $coins = $result->fetch();

        return $coins;
    }
    // get sum of losing bets
    function getLosing($id, $choice)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT SUM(betListCoins)
            FROM betList
            WHERE betListBetID = :id AND betListBetChoice != :choice");
        $result->execute([
            'id' => $id,
            'choice' => $choice
        ]);

        $coins = $result->fetch();

        return $coins;
    }
    // create a new bet
    function newBet($userID, $betID, $choice, $coins)
    {
        $db = $this->connect();

        $result = $db->prepare("INSERT INTO betList(betListUserID, betListBetID, betListBetChoice, betListCoins)
            VALUES (:userID, :betID, :choice, :coins)");
        $result->execute([
            'userID' => $userID,
            'betID' => $betID,
            'choice' => $choice,
            'coins' => $coins
        ]);
    }
    // get all bets for a user
    function getUserBets($id)
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT betListID, betListBetChoice, betListCoins, betName, betFinalDate
            FROM betList bl
            INNER JOIN bets b
            ON bl.betListBetID = b.nameID
            WHERE betListUserID = :id 
            ORDER BY betListID");
        $result->execute(['id' => $id]);

        return $result;
    }
    // delete bets thate are passed AND where a final choice has been selected
    function closeBets($id)
    {
        $db = $this->connect();

        $result = $db->prepare("DELETE FROM betList
            WHERE betListBetID = :id ");
        $result->execute(['id' => $id]);
    }
    // delete bets 
    function deleteBet($id)
    {
        $db = $this->connect();

        $result = $db->prepare("DELETE FROM betList
            WHERE betListID = :id ");
        $result->execute(['id' => $id]);
    }
}
