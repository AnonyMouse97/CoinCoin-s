<?php include 'includes/header.php' ?>

<main>
    <h2>Welcome !</h2>

    <?php foreach ($displayBets as $bet) :; ?>
        <section class="homeBets">
            <h3><?= $bet['betName']; ?></h3>
            <div class="allOdds">
                <?php foreach (${'odds' . $bet['nameID']} as $choice => $odds) :; ?>
                    <article>
                        <h4><?= $choice; ?></h4>

                        <div class="odds">
                            <p>Odds :</p>
                            <p><?= $odds ?></p>
                        </div>


                        <?php if (strtotime(date('Y-m-d H:i:s')) < strtotime($bet['betFinalDate'])) : ?>
                            <form action="index.php" method="post">
                                <input type="number" name="betCoins" min="0" max="<?= $_SESSION['userCoins']; ?>">
                                <input type="hidden" name="betChoice" value="<?= $choice; ?>">
                                <input type="hidden" name="betID" value="<?= $bet['nameID']; ?>">
                                <input type="submit" value="Bet !">
                            </form>
                        <?php endif ?>
                    </article>
                <?php endforeach ?>
            </div>
            <p>Bets end : <?= $bet['betFinalDate']; ?></p>

        </section>
    <?php endforeach ?>
</main>

<?php include 'includes/footer.php' ?>