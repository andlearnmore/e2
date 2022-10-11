<?php

# 11 = wand
# 12 = dragon
# 13 = potion
# 14 = knight
#Initialize playing deck
$numberCards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$attackCards = [14, 13];
$defendCards = [12, 11];
# TODO: Add in king cards here, and logic below.

$deck = [];
$discard = [];

# Combine arrays to create deck
for ($i = 0; $i < 4; $i++) {
    $deck = array_merge($deck, $numberCards, $attackCards);
};
for ($i = 0; $i < 3; $i++) {
    $deck = array_merge($deck, $defendCards);
};

# Shuffle deck
shuffle($deck);

# Set up two player game
$player1 [] = [
    'name' => 'Human',
    'hand' => array_splice($deck, 0, 5),
    'queens' => []
];
$computer [] = [
    'name' => 'Computer',
    'hand' => array_splice($deck, 0, 5),
    'queens' => []
];
$players = array_merge($player1, $computer);

# Create empty array of turns to keep track of turns -- FOR TESTING
$turns = [];

# Computer goes first
$currentPlayer = $players[0];

// // if count($playerQueens) > 0 {

# Play 10 rounds. FOR TESTING ONLY.
for ($i = 0; $i < 10; $i++) {
    # Display hand for testing
    sort($currentPlayer['hand']);
    echo("Current Player: ");
    $turnStartHand = implode(', ', $currentPlayer['hand']);
    echo ($turnStartHand . "\n");


    # Looks for a knight (14) in hand, if so, returns key value; else returns false
    $key = array_search(14, $currentPlayer['hand']);
    if ($key === false) { # if false
        echo("No knight \n");

        # If no knight, look for a potion (13); returns key value or false.
        $key = array_search(13, $currentPlayer['hand']);
        if ($key === false) {
            echo("No potion \n");

            # If no potion, look for a number card, starting with lowest; 11+ are attack or defense cards
            if ($currentPlayer['hand'][0] < 13) {
                
                # If there's a number card, play it.
                $play = array_shift($currentPlayer['hand']);
            };
        } else {

            # There's a potion; play it.
            $play = array_pop($currentPlayer['hand']);
        };
    } else { 

        # There's a knight; play it.
        $play = array_pop($currentPlayer['hand']);
    };

    $discard[] = $play;

    # FOR TESTING: Say what player played and what the discard pile has in it.
    echo($currentPlayer['name'] ." played a " . $play . ". \n"); # Evtl move to index-view
    $discardPile = implode(', ', $discard);
    echo("Discard pile is: " . $discardPile . ".\n");

    # Draw a card.
    $draw = array_pop($deck); 
    $currentPlayer['hand'][] = $draw;
    # Sort hand
    sort($currentPlayer['hand']);

    # Turn 'hand' array into a string for recording turn.
    $currentHand = implode(', ', $currentPlayer['hand']);
    echo($currentHand . "\n");

    # Count remaining cards in deck
    $deckSize = count($deck);

    # Add on to a $results array to display outcomes of each round in the view
    $queens = implode(', ', $currentPlayer['queens']);

    # Output card name
    if ($play == 14) {
        $playedCard = 'knight';
    } elseif ($play == 13) {
        $playedCard = 'potion';
    } elseif ($play == 12) {
        $playedCard = 'dragon';
    } elseif ($play == 11) {
        $playedCard = 'wand';
    } else {
        $playedCard = $play;
    };

    $turns [] = [
        'player' => $currentPlayer['name'],
        'playedCard' => $playedCard,
        'draw' => $draw,
        'hand' => $currentHand,
        'queens' => $queens,
        'deckSize' => $deckSize
    ];
       
    # Switch players
    if ($currentPlayer['name'] == 'Human') { 
        $currentPlayer = $players[1];
    } else {
        $currentPlayer = $players[0];
    };
};
// };
require 'index-view.php';
