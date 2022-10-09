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
$player1 = array_splice($deck, 0, 5);
$computer = array_splice($deck, 0, 5);

$player1Name = 'Human';
$computerName = 'Computer';

$playerQueens = [];
$computerQueens = [];

$deckSize = count($deck);

# Computer goes first
$currentPlayer = $computer;
$currentPlayerName = $computerName;
// if count($playerQueens) > 0 {

# Play 5 rounds. FOR TESTING ONLY.
for ($i = 0; $i < 5; $i++) {
    # Sort hand
    sort($currentPlayer);
    echo("Current Player: ");
    var_dump($currentPlayerName);
    echo("Current Player hand: ");
    var_dump($currentPlayer);
    $key = array_search(14, $currentPlayer); # Looks for a knight in hand, if so, returns key value; else returns false
    echo("Key: ");
    var_dump($key);
    if ($key === false) { # if false
        echo("No knight \n");
        $key = array_search(13, $currentPlayer);
        echo("Key is now: ");
        var_dump($key);
        if ($key === false) {
            echo("No potion \n");
            # Play a number card.
            $key = 0;
            if ($currentPlayer[$key] < 11) {
                $play = array_splice($currentPlayer, $key, 1);
                $discard[] = $play;
                echo($currentPlayerName ." played a " . $play[0] . "\n"); # Evtl move to index-view
                echo("After playing a card the discard pile is:");
                var_dump($discard);
                echo("After playing a card, currentPlayer hand is: ");
                var_dump($currentPlayer);
                $currentPlayer [] = array_pop($deck); # Draw a card. I think I'll make "draw" into a function when I learn how to build my own functions.
                echo("CurrentPlayer hand is: ");
                var_dump($currentPlayer);
                $deckSize = count($deck);
                echo("There are " . $deckSize . " cards in the deck. \n");
                if ($currentPlayer == $computer) { # Switch players
                    $currentPlayer == $player1;
                    $currentPlayerName = $player1Name;
                } else {
                    $currentPlayer == $computer;
                };
            } else {
                echo("Skip turn.");
            };
        } else {
            echo($currentPlayerName ." played a potion. \n"); # Evtl move to index-view
            $play = array_splice($currentPlayer, $key, 1);
            $discard[] = $play;
            echo("After playing a potion the discard pile is:");
            var_dump($discard);
            // echo("CurrentPlayer hand is: ");
            // var_dump($currentPlayer);
            $currentPlayer [] = array_pop($deck); # Draw a card
            // echo("After drawing, current player hand is: ");
            // var_dump($currentPlayer);
            $deckSize = count($deck);
            echo("There are " . $deckSize . " cards in the deck. \n");
            if ($currentPlayer == $computer) { # Switch players
                $currentPlayer == $player1;
                $currentPlayerName = $player1Name;
            } else {
                $currentPlayer == $computer;
            };
        };
    } else { # if true
        echo($currentPlayerName . " played a knight. \n"); # Evtl move to index-view
        $play = array_splice($currentPlayer, $key, 1);
        $discard[] = $play;
        echo("After playing a knight the discard pile is:");
        var_dump($discard);
        // echo("CurrentPlayer hand is: ");
        // var_dump($currentPlayer);
        $currentPlayer [] = array_pop($deck);
        // echo("After drawing, current player hand is: ");
        // var_dump($currentPlayer);
        $deckSize = count($deck);
        echo("There are " . $deckSize . " cards in the deck. \n");
        if ($currentPlayer == $computer) { # Switch players
            $currentPlayer == $player1;
            $currentPlayerName = $player1Name;
        } else {
            $currentPlayer == $computer;
        };
    };
};
// };


// require 'index-view.php';
