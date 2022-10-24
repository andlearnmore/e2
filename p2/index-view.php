<!doctype html>
<html lang='en'>

<head>
    <title>P2: Pick and Play</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
    <h1>Project 2: Pick and Play</h1>
        <form method='POST' action='process.php'>
        <label for='gameChoice'>Which game would you like to play?</label>
        <select id='gameChoice' name='gameChoice'>
            <option value='coinToss' <?php echo (!isset($gameChoice) or $gameChoice['gameChoice'] == 'coinToss') ? 'selected' : '' ?>>Coin Toss</option>
            <option value='rps' <?php echo ((isset($gameChoice) and $gameChoice['gameChoice'] == 'rps') or (isset($rpsResults) and $rpsResults['playerMove'])) ? 'selected' : '' ?>>Rock Paper Scissors</option>
        </select>

        <button class='btn btn-light' type='submit'>Select</button>

        </form>
    </div>


    <?php if(isset($gameChoice)) { ?>

        <!-- # If game is coin toss  -->
        <?php if (($gameChoice['gameChoice'] == 'coinToss') or ($coinResults['choice'])) { ?>
        <h2>Instructions: Coin Toss</h2>
            <p>Select Heads or Tails.</p>
            <p>The computer will flip a coin. If it lands on the side you chose, you win!</p>
            <form action='process.php' method='POST'>
                <input id='heads' name='choice' type='radio' value='heads' <?php echo (!isset($choice) or $choice == 'heads') ? 'checked' : '' ?>>
                <label for='heads'>Heads</label>
                <input id='tails' name='choice' type='radio' value='tails' <?php echo (isset($choice) and $choice == 'tails') ? 'checked' : '' ?>>
                <label for='tails'>Tails</label>
                <button class='btn btn-dark' type='submit'>Submit Choice</button>
            </form>
        
        <?php if($coinResults['choice']) { ?>
        <h2>Results: Coin Toss</h2>
        
        <ul>
            <li>You chose <?php echo $choice ?>.</li>
            <li>The coin landed on <?php echo $flip ?>.</li>
            <li><?php if($playerWins) { ?>You win! <?php } else { ?>You lose. <?php } ?></li>

        </ul>

        <?php } ?>

        <!-- # If game is rock-paper-scissors then show this part -->
        <?php } elseif (($gameChoice['gameChoice'] == 'rps') or ($rpsResults['playerMove'])) {?>
            <h2>Instructions: Rock Paper Scissors</h2>

                <p>This is a standard game of Rock Paper Scissors. You'll play against the computer.</p>
                <p>Ready? Select your move:</p>

                <form action='process.php' method='POST' >
                    <input id='rock' name='playerMove' type='radio' value='rock' <?php echo (!isset($playerMove) or $playerMove == 'rock') ? 'checked' : '' ?>>
                    <label for='rock'>rock</label>
                    <input id='paper' name='playerMove' type='radio' value='paper' <?php echo (isset($playerMove) and $playerMove == 'paper') ? 'checked' : '' ?>>
                    <label for='paper'>paper</label>
                    <input id='scissors' name='playerMove' type='radio' value='scissors' <?php echo (isset($playerMove) and $playerMove == 'scissors') ? 'checked' : '' ?>>
                    <label for='scissors'>scissors</label>
                    <?php if($rpsResults['playerMove']) {?>
                        <button class='btn btn-dark' type='submit'>Play Again</button>
                    <?php } else { ?>
                        <button class='btn btn-dark' type='submit'>Play</button>
                    <?php } ?>
                </form>
            <?php } ?>

        <?php if($rpsResults['playerMove']) { ?>
        <h2>Results: Rock Paper Scissors</h2>
        
        <ul>
            <li>You played <?php echo $playerMove ?>.</li>
            <li>The computer played <?php echo $computerMove ?>.</li>
            <li><?php if ($outcome == 'tie') { ?>It was a draw. 
                <?php } else if ($outcome == 'computer') { ?>
                    <?php echo ucfirst($computerMove) ?> beats <?php echo $playerMove ?>. You lose.
                    <?php } else { echo ucfirst($playerMove) ?> beats <?php echo $computerMove ?>. You win!
                    <?php } ?>

        </ul>

        <?php } ?>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>