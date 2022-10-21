<?php

session_start();

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


$_SESSION['results'] = [
    'playerMove' => $playerMove,
    'computerMove' => $computerMove,
    'outcome' => $outcome
];

header('Location: index.php');
