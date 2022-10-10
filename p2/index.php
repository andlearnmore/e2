<?php

# 11 = wand
# 12 = dragon
# 13 = potion
# 14 = knight
#Initialize playing deck
$numberCards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$attackCards = [14, 13];
$defendCards = [12, 11];

$deck = [];
$discard = [];

for ($i = 0; $i < 4; $i++) {
    $deck = array_merge($deck, $numberCards, $attackCards);
};

for ($i = 0; $i < 3; $i++) {
    $deck = array_merge($deck, $defendCards);
};

// # Shuffle deck
shuffle($deck);

# Give 5 cards to each of 2 players
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

$deckSize = count($deck);

# Computer goes first
$currentPlayer = $players[1];
var_dump($currentPlayer);
// $currentPlayerName = $computerName;
// // if count($playerQueens) > 0 {

# Play 5 rounds. FOR TESTING ONLY.
for ($i = 0; $i < 5; $i++) {
    # Sort hand
    sort($currentPlayer['hand']);
    echo("Current Player: ");
    var_dump($currentPlayer);
    $key = array_search(14, $currentPlayer['hand']); # Looks for a knight in hand, if so, returns key value; else returns false
    if ($key === false) { # if false
        echo("No knight \n");
        $key = array_search(13, $currentPlayer['hand']);
        echo("Key is now: ");
        var_dump($key);
        if ($key === false) {
            echo("No potion \n");
            # Play a number card.
            $key = 0;
            if ($currentPlayer[$key] < 11) {
                $play = array_splice($currentPlayer['hand'], $key, 1);
                $discard[] = $play;
                echo($currentPlayer['name'] ." played a " . $play[0] . "\n"); # Evtl move to index-view
                echo("After playing a card the discard pile is:");
                var_dump($discard);
                echo("After playing a card, currentPlayer hand is: ");
                var_dump($currentPlayer['hand']);
                $currentPlayer['hand'] [] = array_pop($deck); # Draw a card. I think I'll make "draw" into a function when I learn how to build my own functions.
                echo("CurrentPlayer hand is: ");
                var_dump($currentPlayer['hand']);
                $deckSize = count($deck);
                echo("There are " . $deckSize . " cards in the deck. \n");
                if ($currentPlayer == $players[1]) { # Switch players
                    $currentPlayer = $players[0];
                } else {
                    $currentPlayer = $players[1];
                };
            } else {
                echo("Skip turn.");
                if ($currentPlayer == $players[1]) { # Switch players
                    $currentPlayer = $players[0];
                } else {
                    $currentPlayer = $players[1];
                };
            };
        } else {
            echo($currentPlayer['name'] ." played a potion. \n"); # Evtl move to index-view
            $play = array_splice($currentPlayer['hand'], $key, 1);
            $discard[] = $play;
            echo("After playing a potion the discard pile is:");
            var_dump($discard);
            $currentPlayer['hand'] [] = array_pop($deck); # Draw a card
            $deckSize = count($deck);
            echo("There are " . $deckSize . " cards in the deck. \n");
            if ($currentPlayer == $players[1]) { # Switch players
                $currentPlayer = $players[0];
            } else {
                $currentPlayer = $players[1];
            };
        };
    } else { # if true
        echo($currentPlayer['name'] . " played a knight. \n"); # Evtl move to index-view
        $play = array_splice($currentPlayer['hand'], $key, 1);
        $discard[] = $play;
        echo("After playing a knight the discard pile is:");
        var_dump($discard);
        // echo("CurrentPlayer hand is: ");
        // var_dump($currentPlayer);
        $currentPlayer['hand'] = array_pop($deck);
        // echo("After drawing, current player hand is: ");
        // var_dump($currentPlayer);
        $deckSize = count($deck);
        echo("There are " . $deckSize . " cards in the deck. \n");
        if ($currentPlayer == $players[1]) { # Switch players
            $currentPlayer = $players[0];
        } else {
            $currentPlayer = $players[1];
        };
    };
};
// };


// require 'index-view.php';
