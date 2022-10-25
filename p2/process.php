<?php
// Dwojeski-Santos P2 DGMD E-2: October 2022 

session_start();

# __________ Which Game __________ #

$_SESSION['gameChoice'] = [
    'gameChoice' => $_POST['gameChoice']
];

# __________ Rock Paper Scissors __________ #

$playerMove = $_POST['playerMove'];

$computerMove = ['rock', 'paper', 'scissors'][rand(0, 2)];

if ($playerMove == $computerMove) {
    $outcome = 'tie';
} elseif ($playerMove == 'rock') {
    $outcome = ($computerMove == 'paper') ? 'computer' : 'player';
} elseif ($playerMove == 'paper') {
    $outcome = ($computerMove == 'scissors') ? 'computer' : 'player';
} elseif ($playerMove == 'scissors') {
    $outcome = ($computerMove == 'rock') ? 'computer' : 'player';
}

$_SESSION['rpsResults'] = [
    'computerMove' => $computerMove,
    'playerMove' => $playerMove,
    'outcome' => $outcome
];

# __________ Coin Toss __________ #

$choice = $_POST['choice'];

$flip = ['heads', 'tails'][rand(0,1)];

$playerWins = $choice == $flip;

$_SESSION['coinResults'] = [
    'choice' => $choice,
    'flip' => $flip,
    'playerWins' => $playerWins
];

header('Location: index.php');
