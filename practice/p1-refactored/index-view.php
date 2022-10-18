<!doctype html>
<html lang='en'>
<head>
    <title>Project 1</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <h1>Project 1: Make a Rainbow Card Game (Solo Game)</h1>

    <h2>Mechanics</h2>
      <ul>
        <li>In this solo game, a player tries to build a rainbow out of a deck of colorful cards before the deck runs out.</li>
        <li>Cards must be drawn in order of the rainbow to count: first a red card, then an orange card, and so on through ROYGBIV.</li>
        <li>To begin the game, the cards are shuffled and the player draws a card.</li>
        <li>If the card drawn is red, the player keeps it and draws a new card--this time looking for an orange card (and on through the rainbow).</li>
        <li>If the card is not of the color sought, the player discards it and draws the next card.</li>
        <li>Play continues until the player builds a hand of rainbow cards (ROYGBIV) or runs out of cards in the deck.</li>
      </ul>

    <h2>Results</h2>

    <h3>Stats Summary</h3>
      <ul>
        <li>You played <?php echo $plays ?> rounds.</li>
        <li>You won <?php echo $avgWins ?> percent of the time.</li>
        <li>Your fastest win was in <?php echo $best ?> draws.</li>
      </ul>

    <h3>Game Outcomes</h3>
      <?php foreach ($results as $key => $result) { ?>
      <h4>Round <?php echo($key + 1) ?></h4>
        <ul>
          <li>
            <?php if ($result['outcome'] == 'win') { ?>
              <b>Congratulations, you win! You found a rainbow &#127752.</b>
              <?php } else { ?>
              <b>Sorry, the deck is empty and you did not find a rainbow. Better luck next time &#127808.</b>
            <?php }; ?>
          </li>
          <li>Your final hand was: <?php echo $result['finalHand'] ?>
          </li>
          <li>Cards drawn: <?php echo $result['cardsDrawn'] ?>
          </li>
        </ul>
      <?php } ?>

</body>
</html>


