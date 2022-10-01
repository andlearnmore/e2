
# Project 1
+ By: Anne Dwojeski-Santos
+ URL: <http://e2p1.andlearn.me>

## Game planning
+ Create array of rainbow cards (5 each of ROYGBIV).
+ Create a win-condition array of ROYGBIV for progress checking and win condition
+ Initialize an array for the solo player’s hand
+ Create variables to keep track of:
    ++ Deck size
    ++ A drawn card
    ++ Progress through win-condition
    ++ Outcome
    ++ Cards drawn during the game
+ Shuffle the deck
+ Play until the deck is empty, or the player gets the final card of the rainbow, whichever comes first.
+ Player draws a card. If it matches the sought card, add it to the player's hand & check for win.
+ If the card completes the rainbow (win), break out of loop.
+ Otherwise, advance progress counter and continue through loop.
+ In the view, report the results.



## Outside resources
+ https://www.php.net/manual/en/function.implode.php - How to join array elements as a string.
+ https://badih76.medium.com/use-emoji-in-html-php-javascript-and-css-12ba04112f4b - Insert emoji unicode in php.

## Notes for instructor

