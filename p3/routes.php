<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['NounsController', 'index'],
    '/all-nouns' => ['NounsController', 'allNouns'],
    '/next-word' => ['NounsController', 'nextWord'],
    '/results' => ['NounsController', 'gameResults'],
    '/games' => ['NounsController', 'games'],
    '/score-play' => ['NounsController', 'scorePlay']
    
];