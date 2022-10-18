<?php

# Create an array of ROYGBIV for foundation of a deck, progress monitoring, and win condition
$rainbow = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

# Initialize empty array for starting deck
$startingDeck = [];

# Create starting deck of 35 cards out of $rainbow array
for ($i = 0; $i < 5; $i++) {
    $startingDeck = array_merge($startingDeck, $rainbow);
};

# Create an empty array to use to calculate shortest time to win
$rounds = [];

# Initialize variables that are used outside of for-loop
$plays = 10;
$wins = 0;

# Play the game $plays number of times
for ($i = 0; $i < $plays; $i++) {
    $deck = $startingDeck;
    $deckSize = count($deck);
    $progress = 0;
    $player1Hand = [];
    shuffle($deck);

    # Play until the deck is empty or the player wins, whichever happens first.
    while (count($deck) > 0) {
        $draw = array_pop($deck);
        if ($draw == $rainbow[$progress]) {
            $player1Hand[] = $draw;
            if ($player1Hand == $rainbow) {
                break;
            } else {
                $progress++;
            }
        }
    }

    # Determine outcome
    $outcome = ($player1Hand == $rainbow) ? 'win' : 'lose';
    
    if ($outcome == 'win') {
        $wins++;
    }

    # Calculate the number of cards drawn and add that to the $rounds array
    $cardsDrawn = $deckSize - count($deck);
    $rounds [] = $cardsDrawn;

    # Add on to a $results array to display outcomes of each round in the view
    $results [] = [
        'cardsDrawn' => $cardsDrawn,
        'finalHand' => implode(', ', $player1Hand),
        'outcome' => $outcome
    ];
}

$avgWins = ($wins/$plays) * 100;
$best = min($rounds);

require "index-view.php";
