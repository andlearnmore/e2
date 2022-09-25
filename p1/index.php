<?php

require "index-view.php";

# Create array for the deck of cards.
$deck = [
  'red', 'red', 'red', 'red', 'red',
  'orange', 'orange', 'orange', 'orange', 'orange',
  'yellow', 'yellow', 'yellow', 'yellow', 'yellow',
  'green', 'green', 'green', 'green', 'green',
  'blue', 'blue', 'blue', 'blue', 'blue',
  'indigo', 'indigo', 'indigo', 'indigo', 'indigo',
  'violet', 'violet', 'violet', 'violet', 'violet'
];
// var_dump($deck[7]);

# Create a win-condition array of ROYGBIV
$rainbow = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
// var_dump($rainbow);

# Create a $progress variable to keep track of where in this array we're matching to; start at 0.
$progress = 0;

# Shuffle deck
shuffle($deck);
// var_dump($deck);

# Draw top card and look for match to 0, when that is met, +1 to $progress
# REMEMBER TO DO 'WHILE DECK IS LARGER THAN 0 SO WE DON'T RETURN A NULL VALUE.


var_dump($progress);

# Draw card
$draw = array_shift($deck);
var_dump($draw);

var_dump($rainbow[$progress]);

# Check if card drawn matches the card we're looking for.
if ($draw == $rainbow[$progress]) {
    echo("let's go!");
    $progress++;
    var_dump($progress);
} else {
    echo("no match");
}


# Return card to end of deck
// var_dump($deck);
// array_push($deck, $draw);
// var_dump($deck);

# Create a counter for the number of draws it takes.

# Create a 100-game sequence and keep track of the number of draws from the counter for each game.
# (Use an array and after each game, add the counter value to the array before starting the next game.)
