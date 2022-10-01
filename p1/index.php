<?php

// Create an array of ROYGBIV for progress monitoring and win condition
$rainbow = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
$outcome = null;
$cardsDrawn = null;
$draw = null;

for ($i = 0; $i < 10; $i++) {
    $deck = [
    'red', 'red', 'red', 'red', 'red',
    'orange', 'orange', 'orange', 'orange', 'orange',
    'yellow', 'yellow', 'yellow', 'yellow', 'yellow',
    'green', 'green', 'green', 'green', 'green',
    'blue', 'blue', 'blue', 'blue', 'blue',
    'indigo', 'indigo', 'indigo', 'indigo', 'indigo',
    'violet', 'violet', 'violet', 'violet', 'violet',
    ];

    // Initialize an array for the player's hand
    $player1Hand = [];

    // Initialize variables
    $deckSize = count($deck);
    $progress = 0;

    shuffle($deck);

    // Play until the deck is empty or the player wins, whichever happens first.
    // Player draws a card. If it matches the sought card, add it to the player's hand & check for win.
    // If the card completes the rainbow (win), break out of loop.
    // Otherwise, advance progress counter and continue through loop.

    while (count($deck) > 0) {
        $draw = array_pop($deck);
        if ($draw == $rainbow[$progress]) {
            $player1Hand[] = $draw;
            // echo("Match: You're looking for " . $rainbow[$progress] . " and your card is " . $draw . ".\n");

            if ($player1Hand == $rainbow) {
                break;
            } else {
                $progress++;
            };
        };
    };

    $cardsDrawn = $deckSize - count($deck);
    $finalHand = implode(', ', $player1Hand);

    if ($player1Hand == $rainbow) { # Win
        $outcome = "You found a rainbow \u{1F308} Congratulations! You win!";
    } else {
        $outcome = "Sorry, the deck is empty and you did not find a rainbow. Better luck next time \u{1F340}.";
    };

    $results [] = [
        'cardsDrawn' => $cardsDrawn,
        'finalHand' => $finalHand,
        'outcome' => $outcome
    ];
};

var_dump($results);

require "index-view.php";








# Return card to end of deck
// var_dump($deck);
// array_push($deck, $draw);
// var_dump($deck);

# Create a counter for the number of draws it takes.

# Create a 100-game sequence and keep track of the number of draws from the counter for each game.
# (Use an array and after each game, add the counter value to the array before starting the next game.)
// echo("Match: You're looking for " . $rainbow[$progress] . " and your card is " . $draw . ".\n");
