<?php

session_start();

# __________ Which Game __________ #

$_SESSION['gameChoice'] = [
    'gameChoice' => $_POST['gameChoice']
];

# __________ Number Game __________ #

// $guess = $_POST['guess'];

$_SESSION['guess'] = [
    'guess' => $_POST['guess']
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

header('Location: index.php');
