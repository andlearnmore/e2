<?php

namespace App\Controllers;

use App\Nouns;

class NounsController extends Controller 
{
    public function index()
    {
        $nounsObj = new Nouns($this->app->path('database/nouns.json'));
        $nouns = $nounsObj->getAll();

        return $this->app->view('nouns/index', ['nouns' => $nouns
        ]);
    }


}