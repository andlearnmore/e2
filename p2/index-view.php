<!doctype html>
<html lang='en'>

<head>
    <title>Rock Paper Scissors</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Project 2: Rock Paper Scissors</h1>

    <h2>Instructions</h2>
    <ul>
        <p>This is a standard game of Rock Paper Scissors. You'll play against the computer.</p>
        <p>Ready? Select your move:</p>

        <form method='POST' action='process.php'>

            <input type='radio' id='rock' name='playerMove' value='rock' <?php echo (!isset($playerMove) or $playerMove == 'rock') ? 'checked' : '' ?>><label for='rock'>rock</label>
            <input type='radio' id='paper' name='playerMove' value='paper' <?php echo (isset($playerMove) and $playerMove == 'paper') ? 'checked' : '' ?>><label for='paper'>paper</label>
            <input type='radio' id='scissors' name='playerMove' value='scissors' <?php echo (isset($playerMove) and $playerMove == 'scissors') ? 'checked' : '' ?>><label for='scissors'>scissors</label>


        <button type='submit'>Play</button>
        </form>

    <?php if(isset($results)) { ?>
    <h2>Results</h2>
    
    <ul>
        <li>You played <?php echo $playerMove ?>.</li>
        <li>The computer played <?php echo $computerMove ?>.</li>
        <li><?php if ($outcome == 'tie') { ?>It was a tie. 
            <?php } else if ($outcome == 'computer') { ?>
                <?php echo ucfirst($computerMove) ?> beats <?php echo $playerMove ?>. You lose.
                <?php } else { echo ucfirst($playerMove) ?> beats <?php echo $computerMove ?>. You win!
                <?php } ?>

        
    </ul>

    <?php } ?>

</body>

</html>