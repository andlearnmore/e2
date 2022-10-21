<?php

// # 11 = wand
// # 12 = dragon
// # 13 = potion
// # 14 = knight
# Initialize playing deck
$numberCards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$attackCards = [14, 13];
$defendCards = [12, 11];
# TODO: Add in king cards here, and logic below.

$deck = [];
$discard = [];
$turns = [];

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
// Would be nice to use classes with this in the future, but I'm not comfortable enough with them yet.
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

// $players = array_merge($player1, $computer);

# Computer goes first
$currentPlayer = $player1;


# Play 10 rounds. FOR TESTING ONLY.
for ($i = 0; $i < 6; $i++) {
    # Display hand for testing
    // var_dump($currentPlayer[0]['hand']);

    $turnStartHand = implode(', ', $currentPlayer[0]['hand']);

    # Looks for a knight (14) in hand, if so, returns key value; else returns false
    $key = array_search(14, $currentPlayer[0]['hand']);
    if ($key === false) { 
        # If no knight, look for a potion (13); returns key value or false.
        $key = array_search(13, $currentPlayer[0]['hand']);
        if ($key === false) {
            # If no potion, look for a number card, starting with lowest; 11+ are attack or defense cards
            if ($currentPlayer[0]['hand'][0] < 13) {
                $play = array_shift($currentPlayer[0]['hand']);
            };
        } else {
            # There's a potion; play it.
            $play = array_pop($currentPlayer[0]['hand']);
        };
    } else { 
        # There's a knight; play it.
        $play = array_pop($currentPlayer[0]['hand']);
    };

    $discard[] = $play;
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

    # Draw a card.
    $draw = array_pop($deck); 
    $currentPlayer[0]['hand'][] = $draw;
    echo "WARNING!";
    var_dump($currentPlayer[0]['hand']);
    # Sort hand
    sort($currentPlayer[0]['hand']);

    $turns [] = [
        'turnStartHand' => $turnStartHand,
        'player' => $currentPlayer[0]['name'],
        'playedCard' => $playedCard,
        'draw' => $draw,
        'hand' => implode(', ', $currentPlayer[0]['hand']),
        'queens' => implode(', ', $currentPlayer[0]['queens']),
        'discard' => implode(', ', $discard), # FOR TESTING
        'deckSize' => count($deck) # FOR TESTING
    ];
       
    # Switch players
    $currentPlayer = ($currentPlayer[0]['name'] == 'Human') ? $computer : $player1;

}
// }
require 'index-view.php';
