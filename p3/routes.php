<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['NounsController', 'index'],
    '/score-play' => ['NounsController', 'scorePlay'],
    '/all-nouns' => ['NounsController', 'allNouns'],

];