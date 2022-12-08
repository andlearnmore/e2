<?php

namespace App\Controllers;

use App\Nouns;

class NounsController extends Controller 
{


    public function index()
    {
        $nouns = $this->app->db()->all('nouns');

        return $this->app->view('nouns/index', ['nouns' => $nouns]);
    }


}