<?php

declare(strict_types=1);

require_once('connectDB.php');

class BetsManager extends ConnectDB
{
    // get bets for display
    function getBets()
    {
        $db = $this->connect();

        $result = $db->prepare("SELECT *
            FROM bets
            ORDER BY betFinalDate");
        $result->execute();

        return $result;
    }
    // get bets for display
    function addBet($name, $choices, $time)
    {
        $db = $this->connect();

        $result = $db->prepare("INSERT INTO bets(betName, betChoices, betFinalDate)
            VALUES (:name, :choices, :time)");
        $result->execute([
            'name' => $name,
            'choices' => $choices,
            'time' => $time
        ]);
    }
    // close bet (update final choice)
    function closeBet($bet, $id)
    {
        $db = $this->connect();

        $result = $db->prepare("UPDATE bets
            SET betFinalResult = :choice
            WHERE  nameID = :id");
        $result->execute([
            'choice' => $bet,
            'id' => $id
        ]);

        return $result;
    }
}
