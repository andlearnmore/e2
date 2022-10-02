<?php

// Initialize starting deck outside of for-loop for easy modification
$startingDeck = [
    'red', 'red', 'red', 'red', 'red',
    'orange', 'orange', 'orange', 'orange', 'orange',
    'yellow', 'yellow', 'yellow', 'yellow', 'yellow',
    'green', 'green', 'green', 'green', 'green',
    'blue', 'blue', 'blue', 'blue', 'blue',
    'indigo', 'indigo', 'indigo', 'indigo', 'indigo',
    'violet', 'violet', 'violet', 'violet', 'violet',
    ];

// Create an array of ROYGBIV for progress monitoring and win condition
$rainbow = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

// Create an empty array to use to calculate shortest time to win
$rounds = [];

// Initialize variables that are used outside of for-loop
$plays = 10;
$wins = 0;

// Play the game $plays number of times
for ($i = 0; $i < $plays; $i++) {
    // Set $deck to $startingDeck; taking this approach in case I want to modify the game later and have deck used be some subset of $startingDeck
    $deck = $startingDeck;
    $deckSize = count($deck);
    $progress = 0;

    $player1Hand = [];

    shuffle($deck);

    // Play until the deck is empty or the player wins, whichever happens first.
    // Player draws a card. If it matches the sought card ($rainbow[$progress]), add it to the player's hand.
    // Check for a win; if the card completes the rainbow, break out of loop.
    // Otherwise, advance progress counter and continue through loop.

    while (count($deck) > 0) {
        $draw = array_pop($deck);
        if ($draw == $rainbow[$progress]) {
            $player1Hand[] = $draw;
            if ($player1Hand == $rainbow) {
                break;
            } else {
                $progress++;
            };
        };
    };

    // Determine outcome
    if ($player1Hand == $rainbow) { # Win
        $outcome = "Congratulations, you win! You found a rainbow \u{1F308}.";
        $wins++;
    } else { # Lose
        $outcome = "Sorry, the deck is empty and you did not find a rainbow. Better luck next time \u{1F340}.";
    };

    // Calculate the number of cards drawn and add that to the $rounds array
    $cardsDrawn = $deckSize - count($deck);
    $rounds[] = $cardsDrawn;

    // Create a string out of the $player1Hand array
    $finalHand = implode(', ', $player1Hand);

    // Add on to a $results array to display outcomes of each round in the view
    $results [] = [
        'cardsDrawn' => $cardsDrawn,
        'finalHand' => $finalHand,
        'outcome' => $outcome
    ];
};

$avgWins = ($wins/$plays) * 100;
$best = min($rounds);

require "index-view.php";
