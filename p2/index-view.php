<!doctype html>
<html lang='en'>

<head>
    <title>Sleeping Queens</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h1>Project 2: Sleeping Queens</h1>

    <h2>Instructions</h2>
    <ul>
        <li>.</li>


        <h2>Results</h2>



        <h3>Turns</h3>

        <table>
            <thead>
                <tr>
                    <th>Turn</th>
                    <th>Starting Hand</th>
                    <th>Player</th>
                    <th>Card Played</th>
                    <th>Draw</th>
                    <th>Hand</th>
                    <th>Queens</th>
                    <th>Discard Pile</th>
                    <th>Cards Remaining in Deck</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turns as $key => $turn) { ?>
                    <tr>
                        <td><?php echo($key + 1) ?></td>
                        <td><?php echo $turn['turnStartHand'] ?></td>
                        <td><?php echo $turn['player'] ?></td>
                        <td><?php echo $turn['playedCard'] ?></td>
                        <td><?php echo $turn['draw'] ?></td>
                        <td><?php echo $turn['hand'] ?></td>
                        <td><?php echo $turn['queens']?></td>
                        <td><?php echo $turn['discard']?></td>
                        <td><?php echo $turn['deckSize'] ?></td>
                    </tr>
                    <?php } ?>

            </tbody>
        </table>

        <form method='POST' action='process.php'>

        </form>


</body>

</html>