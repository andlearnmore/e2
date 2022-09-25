<?php

# TODO
# - uncomment deck cards
# - remove var_dumps

#require "index-view.php";

# Create array for the deck of cards.
$deck = [
  'red', #'red', 'red', 'red', 'red',
  'orange', #'orange', 'orange', 'orange', 'orange',
  'yellow', #'yellow', 'yellow', 'yellow', 'yellow',
  'green', #'green', 'green', 'green', 'green',
  'blue', #'blue', 'blue', 'blue', 'blue',
  'indigo', #'indigo', 'indigo', 'indigo', 'indigo',
  'violet', #'violet', 'violet', 'violet', 'violet'
];
// var_dump($deck[7]);

# Create a win-condition array of ROYGBIV
$rainbow = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

# Initialize an array for the player's hand
$Player1Hand = [];

# Create a $progress variable to keep track of where in this array we're matching to; start at 0.
$progress = 0;

# Shuffle deck
// shuffle($deck);
var_dump($deck);

# While loop
echo("deck count = " . count($deck));

while (count($deck) > 0) {
    if ($progress > 7) {
        echo("You win!");
        return 1;
    } else {
        # Draw card
        $draw = array_shift($deck);
        #echo("draw = " . $draw);
        #echo("deck count = " . count($deck));
        #var_dump($rainbow[$progress]);

        # Check if card drawn matches the card we're looking for.
        if ($draw == $rainbow[$progress]) {
            echo("Your card is " . $draw . " and you were looking for " . $rainbow[$progress] . ".");
            $progress++;
            var_dump($progress);
        } else {
            echo("No match. Your card is " . $draw . " and you were looking for " . $rainbow[$progress] . ".");
            var_dump($progress);
        };
    };
};



echo("Deck is empty.");







# Return card to end of deck
// var_dump($deck);
// array_push($deck, $draw);
// var_dump($deck);

# Create a counter for the number of draws it takes.

# Create a 100-game sequence and keep track of the number of draws from the counter for each game.
# (Use an array and after each game, add the counter value to the array before starting the next game.)
