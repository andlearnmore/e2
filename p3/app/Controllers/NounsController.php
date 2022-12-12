<?php

namespace App\Controllers;

use App\Nouns;

class NounsController extends Controller
{

    public function allNouns()
    {
        $nouns = $this->app->db()->all('nouns');
        return $this->app->view('/all-nouns', ['nouns' => $nouns]);
    }

    public function index()
    {
        $nouns = $this->app->db()->all('nouns');
        $games = $this->app->db()->all('games');

        $newGame = true;
        $newRound = true;
        $round = 0;
        $gameOver = false;


        # Get new game number for new game. If here by redirect, get old game number.
        $gameNumber = $this->app->old('gameNumber'); 
        if (is_null($gameNumber)) {
            # Determine new game number by incrementing most recent one.
            $recentGameId = (reset($games));
            $gameNumber = ($recentGameId == false) ? 0 : (($recentGameId['game_number']) + 1);
        } else {
            $newGame = false;
            $gameNumber = $gameNumber;
        }

        $correct = $this->app->old('correct');
        if (is_null($correct)) {
            
            # If we're not returning a response:
            # Select a random word key from nouns and get the word details.
            $key = array_rand($nouns, 1);
            $gameWord = $nouns[$key];

            # Insert the new game word and details into the DB.
            $this->app->db()->insert('games', [
                'article' => $gameWord['article'],
                'game_number' => $gameNumber,
                'noun_id' => $gameWord['id'],
                'noun' => $gameWord['noun'],
                'round' => $round
            ]);

            return $this->app->view('/index', [
                'gameWord' => $gameWord,
                'gameNumber' => $gameNumber,
                'gameOver' => $gameOver,
                'newGame' => $newGame,
                'newRound' => $newRound,
                'round' => $round
            ]);
        } else {
            $newRound = false;
            $noun = $this->app->old('noun');
            $article = $this->app->old('article');
            $correct = $this->app->old('correct');
            $round++;

            return $this->app->view('/index', [
                'article' => $article,
                'correct' => $correct,
                'gameNumber' => $gameNumber,
                'gameOver' => $gameOver,
                'newGame' => $newGame,
                'newRound' => $newRound,
                'noun' => $noun,
                'round' => $round
            ]);

        }
    
    }

    public function scorePlay()
    {
    
        # Pull in quiz
        $inputs = $this->app->inputAll();

        # validate inputs
        $this->app->validate([
            'gameNumber' => 'required|numeric',
            'id' => 'required|numeric',
            'article' => 'required|maxLength:4',
            'noun' => 'required',
            'guess' => 'required'
    
        ]);

        $gameNumber = $this->app->input('gameNumber');
        $id = $this->app->input('id');
        $article = $this->app->input('article');
        $noun = $this->app->input('noun');
        $guess = $this->app->input('guess');

        # Compare input to answer
        $correct = ($guess == $article) ? 1 : 0;
        
        # SQL statement with named parameters
        $sql = 'UPDATE games SET guess = :guess, correct = :correct WHERE game_number = :gameNumber AND noun_id = :nounId';

        $data = [
            'guess' => $guess,
            'correct' => $correct,
            'gameNumber' => $gameNumber,
            'nounId' => $id
            ];

        $executed = $this->app->db()->run($sql, $data);
        # Return results
        return $this->app->redirect('/', [
            'article' => $article,
            'guess' => $guess,
            'correct' => $correct,
            'gameNumber' => $gameNumber,
            'nounId' => $id,
            'noun' => $noun
        ]);
    } 
}