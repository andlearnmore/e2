<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/nouns' => ['NounsController', 'index'],
    '/nouns/play' => ['NounsController', 'play'],
    '/nouns/der-die-das' => ['NounsController', 'createQuiz']
];