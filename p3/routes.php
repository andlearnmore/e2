<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/noun' => ['NounsController', 'show'],
    '/nouns' => ['NounsController', 'index'],
    '/nouns/start' => ['NounsController', 'start'],
    '/nouns/score-play' => ['NounsController', 'scorePlay']
];