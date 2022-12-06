<?php

namespace App\Controllers;

use App\Nouns;

class NounsController extends Controller 
{

    public function index()
    {
        $nouns = $this->app->db()->getAll('nouns');

        return $this->app->view('nouns/index', ['nouns' => $nouns]);
    }

    public function play()
    {

        // if (empty($this->quiz)) {
        //     $this->quiz = $this->app->db()->getQuiz();
        // } else {
        //     $word = $this->app->db()->getWord($this->quiz);
        // }
        
        
        dump($quiz);
        dump($word);
        return $this->app->view('nouns/play', [
            'quiz' => $this->quiz,
            'word' => $word
        ]);
    }


}