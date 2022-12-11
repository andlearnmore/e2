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

        # Select a random word key from nouns
        $key = array_rand($nouns, 1);
        $gameWord = $nouns[$key];

        # Get all games from DB
        $games = $this->app->db()->all('games');

        $newGame = true;

        # Get new game number for new game. If here by redirect, get old game number. 

        if (is_null($this->app->old('gameNumber'))) {
            # Determine new game number by incrementing most recent one.
            $recentGameId = (reset($games));
            $gameNumber = (empty($recentGameId)) ? 0 : (($recentGameId['game_number']) + 1);
        } else {
            $newGame = false;
            $gameNumber = $this->app->old('gameNumber');
        }
        dump($newGame);
        dump($gameNumber);
        

        # Insert the new game word and details into the DB.
        $this->app->db()->insert('games', [
            'game_number' => $gameNumber,
            'noun_id' => $gameWord['id'],
            'noun' => $gameWord['noun'],
            'article' => $gameWord['article']
        ]);
        dump($gameWord);
     
        return $this->app->view('/index', [
            'gameWord' => $gameWord,
            'gameNumber' => $gameNumber,
            'newGame' => $newGame
        ]);
    
    }

    public function scorePlay()
    {
    # Pull in quiz
    $inputs = $this->app->inputAll();

    # TO DO
    # Validate input

    $gameNumber = $this->app->input('game-number');
    $id = $this->app->input('id');
    $article = $this->app->input('article');
    $noun = $this->app->input('noun');
    $guess = $this->app->input('guess');

    // dump($gameNumber);
    // dump($id);
    // dump($article);
    // dump($noun);
    // dump($guess);

    # Compare input to answer
    $correct = ($guess == $article) ? 1 : 0;
    // dump($correct);

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
        'guess' => $guess,
        'correct' => $correct,
        'gameNumber' => $gameNumber,
        'nounId' => $id
    ]);
    } 
}