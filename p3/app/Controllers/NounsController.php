<?php

namespace App\Controllers;

use App\Nouns;

class NounsController extends Controller 
{

    private $nounsObj;
    public $quiz = ['happy', 'sad'];

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

        // if (empty($this->quiz)) {
        //     $this->quiz = $this->nounsObj->getQuiz();
        // } else {
        //     $word = $this->nounsObj->getWord($this->quiz);
        // }
        
        
        dump($quiz);
        dump($word);
        return $this->app->view('nouns/play', [
            'quiz' => $this->quiz,
            'word' => $word
        ]);
    }


}