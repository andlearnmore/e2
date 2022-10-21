<?php

session_start();

if(isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    $outcome = $results['outcome'];
    $playerMove = $results['playerMove'];
    $computerMove = $results['computerMove'];

    $_SESSION['results'] = null;
    
}
require 'index-view.php';
