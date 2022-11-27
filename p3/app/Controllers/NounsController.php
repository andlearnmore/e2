<?php

namespace App\Controllers;

use App\Nouns;

class NounsController extends Controller 
{

    private $nounsObj;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->nounsObj = new Nouns($this->app->path('/database/nouns.json'));
    }

    public function index()
    {
        $nouns = $this->nounsObj->getAll();

        return $this->app->view('nouns/index', ['nouns' => $nouns]);
    }

    public function play()
    {
        $words = $this->nounsObj->getGameArray();

        return $this->app->view('nouns/play', ['words' => $words]);
    }


}