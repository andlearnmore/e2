<?php

# TODO
# - uncomment deck cards
# - remove var_dumps

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
//   'red',
//   'orange',
//   'yellow',
//   'green',
//   'blue',
//   'indigo',
//   'violet',
];
// var_dump($deck[7]);

# Create a win-condition array of ROYGBIV
$rainbow = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];

# Initialize an array for the player's hand
$player1Hand = [];

# Create a $progress variable to keep track of where in this array we're matching to; start at 0.
$progress = 0;

# Shuffle deck
shuffle($deck);

# Play until the deck is empty, unless the player wins, whichever happens first.
// Can't use "while (count($deck)) >= 0" because then game goes on forever.
// If I use "while (count($deck)) > 0" then if the player hasn't won, it tries to draw from an empty deck.


while (count($deck) > 0) {
    # Draw card
    echo("deck count = " . count($deck));
    $draw = array_shift($deck);

    # Check if card drawn matches the card we're looking for.
    # If it matches, let them know, add one to $progress to advance to next color needed,
    # add the card to the player's hand.
    if ($draw == $rainbow[$progress]) {
        echo("Your card is " . $draw . " and you were looking for " . $rainbow[$progress] . ".");
        array_push($player1Hand, $draw);
        # var_dump($player1Hand);
        # var_dump($progress);
        if ($player1Hand == $rainbow) { # If the player wins, let them know and end game.
            echo("You win!");
            var_dump($deck);
            return 1;
        };
        $progress++;
    } else {
        # If drawn card doesn't match, don't advance $progress, but deck will decrease by 1.
        echo("No match. Your card is " . $draw . " and you were looking for " . $rainbow[$progress] . ".");
        if (count($deck) == 0) {
            echo("Empty deck.");
        };
    };
};

echo("Sorry--no more cards. You lost.");











# Return card to end of deck
// var_dump($deck);
// array_push($deck, $draw);
// var_dump($deck);

# Create a counter for the number of draws it takes.

# Create a 100-game sequence and keep track of the number of draws from the counter for each game.
# (Use an array and after each game, add the counter value to the array before starting the next game.)
