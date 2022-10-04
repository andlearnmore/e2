
# Project 1
+ By: Anne Dwojeski-Santos
+ URL: <http://e2p1.andlearn.me>

## Game planning

+ Create a win-condition array of ROYGBIV for progress checking and win condition
+ Use that array to create a "deck" of colorful cards (5 each of ROYGBIV).
+ Create variables to use as part of game

+ Set a loop to play the game multiple times
+ Create variables to keep track of:
    + Deck size
    + Progress through win-condition array
+ Initialize an array for the solo player’s hand
+ Shuffle the deck
+ Play until the deck is empty, or the player gets the final card of the rainbow, whichever comes first.
+ Player draws a card. 
    + If it matches the sought card: 
        + add it to the player's hand
        + check for win
            + If the card completes the rainbow (win), break out of loop. 
            + Otherwise, advance progress counter and continue through loop.
    + If the card does not match the sought card, "discard" it and draw another card.

+ In the view, report the stats, including: 
    + Number of rounds played
    + Average number of wins
    + The lowest number of cards it took to get a win

+ In the view, report the results of each round.

## Outside resources
+ https://www.php.net/manual/en/function.implode.php - Join array elements as a string.
+ https://www.php.net/manual/en/function.array-sum.php - Find sum of elements in an array.
+ https://www.php.net/manual/en/function.min.php - Find lowest value in an array.
+ https://www.php.net/manual/en/function.array-merge.php - Merge arrays.
+ https://www.w3schools.com/html/html_emojis.asp - Insert emoji UTF-8 in html.
+ Took advantage of Jenni's office hours 10/3/22. She helped me think about making starting deck array more DRY, and improving my separation of concerns in my outcome.

## Notes for instructor
+ Question: I originally initialized $cardsDrawn, $draw, and $outcome outside the main for-loop (so as global variables?) setting them to null. I then removed them for my final submission since they're only used within the for-loop and are reset in the loop based on outcomes in the current round played. Should I have initialized them first or let them appear within the for-loop? What is best practice for this?
