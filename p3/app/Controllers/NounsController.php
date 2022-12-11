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

    public function start()
    # Play is going to be accessed 
    # (1) when "Play" button is clicked on index page, and
    # (2) when "Next" button is clicked on index page.
    {
        # Get all nouns from DB 
        $nouns = $this->app->db()->all('nouns');

        # Select a random word key from nouns
        $key = array_rand($nouns, 1);
        $gameWord = $nouns[$key];

        # Get all games from DB
        $games = $this->app->db()->all('games');

        # Get most recent game
        $recentGameId = (reset($games));
    
        # Determine game number by incrementing most recent one.
        $gameNumber = (empty($recentGameId)) ? 0 : (($recentGameId['game_number']) + 1);

        $this->app->db()->insert('games', [
            'game_number' => $gameNumber,
            'noun_id' => $gameWord['id'],
            'noun' => $gameWord['noun'],
            'article' => $gameWord['article']
        ]);
        dump($gameNumber);
        dump($gameWord['id']);
        dump($gameWord['noun']);
        dump($gameWord['article']);

        // if {
        //     #check if it's been used
        //     $wordKey == $this->app->old('wordKey') 
        //     $wordKey = array_rand($nouns, 1);
        // }
        # Get all nouns from DB and see how many there are
        // $nouns = $this->app->db()->all('nouns');
        // $nounsLength = count($nouns);
        // $input = $this->app->inputAll();
        // dump($input);

        // # Check if this is part of inPlay or a new game
        // $gameLength = 3;
        // $gameOver = $this->app->old('gameOver');
        // $newGame = $this->app->old('newGame');
        // dump($gameOver);
        // dump($newGame);
        // $roundsLeft = ($newGame == false) ? ($roundsLeft++) : 0;

        // if ($roundsLeft = $gameLength) {
        //     $gameOver = true;
        // }
        // // } else {
        // //     # Select a random word key from nouns
        //     $wordKey = array_rand($nouns, 1);
        //     if {
        //         #check if it's been used
        //         $wordKey == $this->app->old('wordKey') 
        //         $wordKey = array_rand($nouns, 1);
        //     }
        // }
        return $this->app->view('/nouns/start', [
            'gameWord' => $gameWord, 
            'gameNumber' => $gameNumber,
            'noun' => $gameWord['noun']
        ]); 

    }

    public function show()
    {
        # Get the noun for this round of the game from the URL and use that to get data from nouns table
        $noun = $this->app->param('noun');
        $gameNumber = $this->app->param('game');
        $nounQuery = $this->app->db()->findByColumn('nouns', 'noun', '=', $noun);

        if (empty($nounQuery)){
            return $this->app->view('nouns/missing');
        } else {
            $noun = $nounQuery[0];
        }

        dump($noun);

        return $this->app->view('nouns/show', [
            'noun' => $noun, 
            'gameNumber' => $gameNumber
        ]); 
    }

    public function scorePlay()
    {
        # Pull in quiz
        $inputs = $this->app->inputAll();
        $games = $this->app->db()->all('games');
        // $nounQuery = $this->app->db()->findByColumn('nouns', 'noun', '=', $noun);


        $gameNumber = $this->app->input('game-number');
        $id = $this->app->input('id');
        $article = $this->app->input('article');
        $noun = $this->app->input('noun');
        $guess = $this->app->input('guess');


        dump($gameNumber);
        dump($id);
        dump($article);
        dump($noun);
        dump($guess);

        $correct = ($guess == $article) ? 1 : 0;
        dump($correct);

        # SQL statement with named parameters
        $sql = 'UPDATE games SET guess = :guess, correct = :correct WHERE game_number = :gameNumber AND noun_id = :nounId';

        $data = [
            'guess' => $guess,
            'correct' => $correct,
            'gameNumber' => $gameNumber,
            'nounId' => $id
            ];

            $executed = $this->app->db()->run($sql, $data);

    # TO DO
        # Validate input

        # Bring in input and persist to DB
        // $gameNumber = $this->app->input('game-number');
        

        # Compare input to answer
        # Determine correctness
        # Insert into games table using SQL UPDATE.


        # Get all games as an array.



        # Persist to games table
        // $this->app->db()->insert('games',

        # Process form inputs
        # Check quiz (answers) vs inputs (guesses)
        # Return results
        // return $this->app->redirect();
    
    }
}