<?php

session_start();

$playerMove = $_POST['playerMove'];

$computerMove = ['rock', 'paper', 'scissors'][rand(0, 2)];

if ($playerMove == $computerMove) {
    $outcome = 'tie';
} elseif ($playerMove == 'rock') {
    if ($computerMove == 'paper') {
        $outcome = 'computer';
    } else {
        $outcome = 'player';
    }
} elseif ($playerMove == 'paper') {
    if ($computerMove == 'scissors') {
        $outcome = 'computer';
    } else {
        $outcome = 'player';
    }
} elseif ($playerMove == 'scissors') {
    if ($computerMove == 'rock') {
        $outcome = 'computer';
    } else {
        $outcome = 'player';
    }
}


$_SESSION['results'] = [
    'playerMove' => $playerMove,
    'computerMove' => $computerMove,
    'outcome' => $outcome
];

header('Location: index.php');
