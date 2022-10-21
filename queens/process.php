<?php

session_start();

# Collect input from form
// $answer = $_POST['answer'];

$anyInput = true;

if ($answer == '') {
    $anyInput = false;
} elseif ($answer == 'pumpkin') {
    $correct = true;
} else {
    $correct = false;
}

$_SESSION['results'] = [
    'anyInput' => $anyInput,
    'correct' => $correct
];

header('Location: index.php');
