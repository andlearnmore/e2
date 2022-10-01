<!doctype html>
<html lang='en'>
<head>
    <title>Project 1</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>
</head>
  <body>
    <h1>Project 1</h1>

    <h2>Mechanics</h2>
      <ul>
        <li>In this solo game, the player tries to build a rainbow out of a deck of rainbow cards before the cards run out.</li>
      </ul>
    <h3>Solo game</h3>
      <ul>
        <li>The cards are shuffled and the player is dealt cards one by one.</li>
        <li>If a card is red, the player keeps it and draws a new card to look for an orange card (and on through the rainbow).</li>
        <li>If the card is not of the color sought, the player discards it and draws the next card.</li>

        <li>I'm going to have a counter for how many draws it took to win.</li>
        <li>I'd also like to do a test with 100 plays and see the average number of draws it takes.</li>
      </ul>

    <h3>Two-player game</h3>
      <ul>
        <li>For the two-player game, the cards are shuffled and each person gets half of the deck.</li>
        <li>Players take turns drawing a card and seeing if it's the next rainbow color they need.</li>
        <li>PHASE 2: If yes, they get a second draw.</li>
        <li>If it's not the next card they need, they put the card on the bottom of the deck.</li>
        <li>The first player to build a rainbow wins.</li>
      </ul>

    <h2>Results</h2>
    <ul>
      <li><?php echo("Your final hand is: " .implode(', ', $player1Hand) . "."); ?></li>
      <li><?php echo($outcome); ?></li>
      <li>Cards drawn: <?php echo($cardsDrawn); ?></li>
    </ul>
</body>
</html>