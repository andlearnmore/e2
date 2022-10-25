<!doctype html>
<html lang='en'>

<head>
    <title>P2: Pick and Play</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class='container'>
        <h1>Project 2: Pick and Play</h1>
        <h5>by Anne Dwojeski-Santos</h5>
            <form method='POST' action='process.php'>
            <div class='alert alert-primary' role='alert'>
                <label for='gameChoice'>Which game would you like to play? Select from the drop-down menu.</label>
                <br>
                <br>
                <div class='dropdown'>
                    <select id='gameChoice' name='gameChoice'>
                        <option value='coinToss' <?php echo (!isset($gameChoice) or $gameChoice['gameChoice'] == 'coinToss') ? 'selected' : '' ?>>Coin Toss</option>
                        <option value='rps' <?php echo ((isset($gameChoice) and $gameChoice['gameChoice'] == 'rps') or (isset($rpsResults) and $rpsResults['playerMove'])) ? 'selected' : '' ?>>Rock Paper Scissors</option>
                    </select>
                </div>
                <br>
                <button class='btn btn-light' type='submit'>Select</button>
            </div> 
            </form>
            <br>

        <?php if(isset($gameChoice)) { ?>

        <!-- # If game is coin toss  -->
        <?php if (($gameChoice['gameChoice'] == 'coinToss') or ($coinResults['choice'])) { ?>
        <div class='alert alert-info' role='alert'>
            <h2>Instructions: Coin Toss</h2>
            <p>Select Heads or Tails.</p>
            <p>The computer will flip a coin. If it lands on the side you choose, you win!</p>
        </div>
        <div class='row'>
            <div class='col-sm'>
                <div class='alert alert-info' role='alert'>
                    <form action='process.php' method='POST'>
                        <div class='form-check'>
                            <input class='form-check-input' id='heads' name='choice' type='radio' value='heads' <?php echo (!isset($choice) or $choice == 'heads') ? 'checked' : '' ?>>
                            <label class='form-check-label' for='heads'>Heads</label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' id='tails' name='choice' type='radio' value='tails' <?php echo (isset($choice) and $choice == 'tails') ? 'checked' : '' ?>>
                            <label class='form-check-label' for='tails'>Tails</label>
                        </div>
                        <br>
                        <?php if($choice) {?>
                            <button class='btn btn-light' type='submit'>Play Again</button>
                        <?php } else { ?>
                            <button class='btn btn-light' type='submit'>Play</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <div class='col-sm'>
                <?php if($coinResults['choice']) { ?>
                <div class='alert alert-info' role='alert'>
                    <h2>Results: Coin Toss</h2>
                    <ul>
                        <li>You chose <?php echo $choice ?>.</li>
                        <li>The coin landed on <?php echo $flip ?>.</li>
                        <li><?php if($playerWins) { ?>You won! <?php } else { ?>You lost. Better luck next time.<?php } ?></li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- # If game is rock-paper-scissors -->
        <?php } elseif (($gameChoice['gameChoice'] == 'rps') or ($rpsResults['playerMove'])) {?>
        <div class='alert alert-warning' role='alert'>
            <h2>Instructions: Rock Paper Scissors</h2>
            <p>This is a standard game of Rock Paper Scissors, in which you'll play against the computer.</p>
            <ul>
                <li>Rock breaks scissors</li>
                <li>Scissors cuts paper</li>
                <li>Paper covers rock</li>
            </ul>
        </div>
        <div class='row'>
            <div class='col-sm'>
                <div class='alert alert-warning' role='alert'>
                    <p>Ready? Select your move:</p>
                    <form action='process.php' method='POST' >
                        <div class='form-check'>
                            <input class='form-check-input' id='rock' name='playerMove' type='radio' value='rock' <?php echo (!isset($playerMove) or $playerMove == 'rock') ? 'checked' : '' ?>>
                            <label class='form-check-label' for='rock'>rock</label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' id='paper' name='playerMove' type='radio' value='paper' <?php echo (isset($playerMove) and $playerMove == 'paper') ? 'checked' : '' ?>>
                            <label class='form-check-label' for='paper'>paper</label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' id='scissors' name='playerMove' type='radio' value='scissors' <?php echo (isset($playerMove) and $playerMove == 'scissors') ? 'checked' : '' ?>>
                            <label class='form-check-label' for='scissors'>scissors</label>
                        </div>
                        <br>
                        <div>
                            <?php if($rpsResults['playerMove']) {?>
                                <button class='btn btn-light' type='submit'>Play Again</button>
                            <?php } else { ?>
                                <button class='btn btn-light' type='submit'>Play</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            <?php } ?>
            </div>

            <div class='col-sm'>
                <?php if($rpsResults['playerMove']) { ?>
                <div class='alert alert-warning' role='alert'>
                    <h2>Results: Rock Paper Scissors</h2>
                    <ul>
                        <li>You played <?php echo $playerMove ?>.</li>
                        <li>The computer played <?php echo $computerMove ?>.</li>
                        <li><?php if ($outcome == 'tie') { ?>It was a draw. 
                            <?php } else if ($outcome == 'computer') { ?>
                            <?php echo ucfirst($computerMove) ?> beats <?php echo $playerMove ?>. You lose.
                            <?php } else { echo ucfirst($playerMove) ?> beats <?php echo $computerMove ?>. You win!
                            <?php } ?>
                        </li>
                    </ul>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>