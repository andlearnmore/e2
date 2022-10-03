<?php

// THIS IS A 2-PLAYER VERSION OF PROJECT 1.

// Initialize starting deck outside of for-loop for easy modification
$startingDeck = [
    // 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red',
    // 'orange', 'orange', 'orange', 'orange', 'orange', 'orange', 'orange', 'orange', 'orange', 'orange',
    // 'yellow', 'yellow', 'yellow', 'yellow', 'yellow', 'yellow', 'yellow', 'yellow', 'yellow', 'yellow',
    // 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green',
    // 'blue', 'blue', 'blue', 'blue', 'blue', 'blue', 'blue', 'blue', 'blue', 'blue',
    // 'indigo', 'indigo', 'indigo', 'indigo', 'indigo', 'indigo', 'indigo', 'indigo', 'indigo', 'indigo',
    // 'violet', 'violet', 'violet', 'violet', 'violet', 'violet', 'violet', 'violet', 'violet', 'violet'
    'red', 'red', 'orange', 'orange', 'yellow', 'yellow', 'green', 'green', 'blue', 'blue', 'indigo', 'indigo', 'violet', 'violet'
    ];

// Create an array of ROYGBIV for progress monitoring and win condition
$rainbow = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

// Set $deck to $startingDeck; taking this approach in case I want to modify the game later and have deck used be some subset of $startingDeck
$deck = $startingDeck;
$deckSize = count($deck);
echo("Deck has " . $deckSize . " cards.\n");
$player1progress = 0;
$player2progress = 0;

$player1Hand = [];
$player2Hand = [];

shuffle($deck);

// Play until the deck is empty or the player wins, whichever happens first.
// Player draws a card. If it matches the sought card ($rainbow[$progress]), add it to the player's hand.
// Check for a win; if the card completes the rainbow, break out of loop.
// Otherwise, advance progress counter and continue through loop.

$player = 'player1';
$round = 0;



while (count($deck) > 0) {
    // Set initial player to player1
    echo("It is round " . $round . ".\n");
    $checkDeck = implode(', ', $deck);
    echo("Deck: " . $checkDeck . ".\n");
    $draw = array_shift($deck);

    echo($player . " drew " . $draw . ".\n");
    if ($player == 'player1') {
        if ($draw == $rainbow[$player1progress]) { # card is needed
            $player1Hand[] = $draw; # add to hand
            echo("P1 Match! Player 1 drew " . $draw . ".\n");

            if ($player1Hand == $rainbow) { # win
                $winner = 'Player 1';
                break;
            } else { # no win
                $player1progress++;
                echo("P1 needs " . $rainbow[$player1progress] . "\n");
                echo("P2 STILL needs " . $rainbow[$player2progress] . "\n");
                $player = 'player2';
            };
        } else { # card not needed; player 2's turn
            $deck[] = $draw;
            $player = 'player2';
            echo("The player is now " . $player . "\n");
        };
    } else { # $player is 'player2'
        if ($draw == $rainbow[$player2progress]) { # Match
            $player2Hand[] = $draw;
            echo("P2 Match! Player 2 drew " . $draw . ".\n");
            // var_dump($player2Hand);
            if ($player2Hand == $rainbow) {
                $winner = 'Player 2';
                break;
            } else { #no win
                $player2progress++;
                echo("P2 needs " . $rainbow[$player2progress] . "\n");
                echo("P1 STILL needs " . $rainbow[$player1progress] . "\n");
                $player = 'player1';
                $round++;
            };
        } else { # No match; player 1's turn
            $deck[] = $draw;
            $round++;
            $player = 'player1';
            echo("The player is now " . $player . "\n");
        };
    };
};





// Determine outcome
// if ($player1Hand == $rainbow) { # Win
//     $outcome = "Congratulations, you win! You found a rainbow \u{1F308}.";
//     $wins++;
// } else { # Lose
//     $outcome = "Sorry, the deck is empty and you did not find a rainbow. Better luck next time \u{1F340}.";
// };

// // Calculate the number of cards drawn and add that to the $rounds array
// $cardsDrawn = $deckSize - count($deck);
// $rounds[] = $cardsDrawn;

// // Create a string out of the $player1Hand array
// $finalHand = implode(', ', $player1Hand);

// // Add on to a $results array to display outcomes of each round in the view
// $results [] = [
//     'cardsDrawn' => $cardsDrawn,
//     'finalHand' => $finalHand,
//     'outcome' => $outcome
// ];

// $avgWins = ($wins/$plays) * 100;
// $best = min($rounds);

require "index-view.php";
