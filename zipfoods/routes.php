<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/about' => ['AppController', 'about'],
    '/product' => ['ProductsController', 'show'],
    '/products' => ['ProductsController', 'index'],
    '/products/new' => ['ProductsController', 'new'],
    '/products/save-new' => ['ProductsController', 'saveNew'],
    '/products/save-review' => ['ProductsController', 'saveReview'],
    '/practice' => ['AppController', 'practice']
];