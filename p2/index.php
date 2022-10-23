<?php

session_start();

if(isset($_SESSION['gameChoice'])){
    $gameChoice = $_SESSION['gameChoice'];
    $_SESSION['gameChoice'] = null;
}

if(isset($_SESSION['guess'])){
    
}


if(isset($_SESSION['rpsResults'])) {
    $rpsResults = $_SESSION['rpsResults'];
    $outcome = $rpsResults['outcome'];
    $playerMove = $rpsResults['playerMove'];
    $computerMove = $rpsResults['computerMove'];
    $_SESSION['rpsResults'] = null;
    
    var_dump($gameChoice);
    var_dump($rpsResults);

}
require 'index-view.php';
