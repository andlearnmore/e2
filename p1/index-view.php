<!doctype html>
<html lang='en'>
<head>
    <title>Project 1</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>
</head>
  <body>
    <h1>Project 1: Make a Rainbow Card Game (Solo Game)</h1>

    <h2>Mechanics</h2>
      <ul>
        <li>In this solo game, a player tries to build a rainbow (ROYGBIV) out of a deck of colorful cards before the deck runs out.</li>
        <li>The cards are shuffled and the player draws cards one by one.</li>
        <li>If the card drawn is red, the player keeps it and draws a new card--this time looking for an orange card (and on through the rainbow).</li>
        <li>If the card is not of the color sought, the player discards it and draws the next card.</li>
        <li>Play continues until the player builds a rainbow or runs out of cards in the deck.</li>
      </ul>

    <h2>Results</h2>

    <h3>Stats</h3>
      <ul>
        <li>You played <?php echo $plays ?> rounds.</li>
        <li>You won <?php echo $avgWins ?> percent of the time.</li>
        <li>Your fastest win was in <?php echo $best ?> draws.</li>
      </ul>

    <h3>Game outcomes</h3>
      <?php foreach ($results as $key => $result) { ?>
        <h4>Round <?php echo($key + 1) ?></h4>
      <ul>
        <li><b><?php echo $result['outcome'] ?></b>
        </li>
        <li>Your final hand was: <?php echo $result['finalHand'] ?>
        </li>
        <li>Cards drawn: <?php echo $result['cardsDrawn'] ?>
        </li>
      </ul>
      <?php } ?>



</body>
</html>