<?php

session_start();

# __________ Choose Game __________ # 

if(isset($_SESSION['gameChoice'])){
    $gameChoice = $_SESSION['gameChoice'];
    $_SESSION['gameChoice'] = null;
}

# __________ Coin Toss __________ #

if(isset($_SESSION['coinResults'])) {
    $coinResults = $_SESSION['coinResults'];
    $choice = $coinResults['choice'];
    $flip = $coinResults['flip'];
    $playerWins = $coinResults['playerWins'];
    $_SESSION['coinResults'] = null;

}

# __________ Rock Paper Scissors __________ #

if(isset($_SESSION['rpsResults'])) {
    $rpsResults = $_SESSION['rpsResults'];
    $outcome = $rpsResults['outcome'];
    $playerMove = $rpsResults['playerMove'];
    $computerMove = $rpsResults['computerMove'];
    $_SESSION['rpsResults'] = null;
}


require 'index-view.php';
