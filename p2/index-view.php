<!doctype html>
<html lang='en'>

<head>
    <title>Sleeping Queens</title>
    <meta charset='utf-8'>
    <style>
        /* Input style here */
    </style>
</head>

<body>

    <h1>Project 2: Sleeping Queens</h1>

    <h2>Instructions</h2>
    <ul>
        <li>.</li>


        <h2>Results</h2>


        <h3>Turns</h3>
        <?php foreach ($turns as $key => $turn) { ?>
        <h4>Turn <?php echo($key + 1) ?>
        </h4>
        <ul>
            <li>Player: <?php echo $turn['player'] ?>
            </li>
            <li>Card played: <?php echo $turn['playedCard'] ?>
            </li>
            <li>Draw: <?php echo $turn['draw'] ?>
            </li>
            <li>Hand: <?php echo $turn['hand'] ?>
            </li>
            <li>Queens: <?php echo $turn['queens']?>
            </li>
            <li>Cards left in deck: <?php echo $turn['deckSize'] ?>
            </li>

        </ul>
        <?php } ?>
        <form method='POST' action='process.php'>

        </form>


</body>

</html>