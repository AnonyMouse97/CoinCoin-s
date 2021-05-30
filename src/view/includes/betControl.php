<section>
    <a href="http://localhost/index.php?page=admin&mode=closeBet&close=1">Close Bets</a>
    <?php foreach ($displayBets as $bet) : ?>
        <article>
            <h2><?= $bet['betName'] ?></h2>
            <p><?= $bet['betFinalDate'] ?></p>
            <?php if (!is_null($bet['betFinalResult'])) : ?>
                <p>Bet already closed, choice : <?= $bet['betFinalResult'] ?></p>
            <?php endif ?>
            <form action="" method="post">
                <label for="choice">Bet result :</label>
                <select name="choice" id="choice">
                    <?php foreach (${'choices' . $bet['nameID']} as $choice) : ?>
                        <option value="<?= $choice ?>"><?= $choice ?></option>
                    <?php endforeach; ?>
                    <input type="hidden" name="betID" value="<?= $bet['nameID'] ?>">
                    <input type="submit" value="Close bet">
                </select>
            </form>
        </article>
    <?php endforeach ?>
</section>