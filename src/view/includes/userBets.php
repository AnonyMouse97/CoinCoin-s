<section>
    <h2>My last bets</h2>
    <?php foreach ($userBets as $bet) : ?>

        <section class="userBets">
            <h3><?= $bet['betName'] ?></h3>

            <table>
                <tr>
                    <th>Choice</th>
                    <th>Bet</th>
                    <?php if (strtotime(date('Y-m-d H:i:s')) <= strtotime($bet['betFinalDate'])) : ?>
                        <th>Delete</th>
                    <?php endif ?>
                </tr>
                <tr>
                    <td>
                        <?= $bet['betListBetChoice'] ?>
                    </td>
                    <td>
                        <?= $bet['betListCoins'] ?>
                    </td>
                    <?php if (strtotime(date('Y-m-d H:i:s')) <= strtotime($bet['betFinalDate'])) : ?>
                        <td>
                            <a href="index.php?page=userSpace&mode=bets&delete=<?= $bet['betListID'] ?>"><img src="/content/img/trash.svg" alt=""></a>
                        </td>
                    <?php endif ?>
                </tr>
            </table>


        </section>
    <?php endforeach ?>

</section>