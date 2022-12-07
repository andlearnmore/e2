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

    public function createQuiz()
    {

        $nouns = $this->app->db()->all('nouns');
        
        $nounsLength = count($nouns);
        $quizLength = 10;

        if ($nounsLength >= $quizLength) {
            $keys = array_rand($nouns, $quizLength);
            shuffle($keys);
        } else {
            $keys = array_rand($nouns, $nounsLength);
            shuffle($keys);
        }

        foreach ($keys as $key) {
            $quiz[] = $nouns[$key];
        }

        return $this->app->view('nouns/der-die-das', [
            'quizWords' => $quiz
        ]);

    }

    public function play()
    {

        // if (empty($this->quiz)) {
        //     $this->quiz = $this->app->db()->getQuiz();
        // } else {
        //     $word = $this->app->db()->getWord($this->quiz);
        // }
        # use getQuiz to get $quizWords array
        # For each $quizWords as $quizWord,
            # display on 
        
        dump($quiz);
    
    }


}