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
        $gameOver = false;
        
        $newRound = true;

        $correct = $this->app->old('correct');
        if (is_null($correct)) {
            # Get new game number for new game. If here by redirect, get old game number.
            $gameNumber = $this->app->old('gameNumber'); 
            if (is_null($gameNumber)) {
                # Determine new game number by incrementing most recent one.
                $recentGameId = (reset($games));
                $gameNumber = ($recentGameId == false) ? 0 : (($recentGameId['gameNumber']) + 1);
            } else {
                $newGame = false;
                $gameNumber = $gameNumber;
            }
            dump('Game number');
            dump($gameNumber);

            $round = $this->app->old('round');
            if (is_null($round)) {
                $recentGameId = (reset($games));
                dump('recentGameId');
                dump($recentGameId);
                $round = ($recentGameId == false) ? 0 : (($recentGameId['round']) + 1);
            } else {
                $round = $round++;
            }
            dump('Round');
            dump($round);
            
            # If we're not returning a response:
            # Select a random word key from nouns and get the word details.
            $key = array_rand($nouns, 1);
            $gameWord = $nouns[$key];

            # Insert the new game word and details into the DB.
            $this->app->db()->insert('games', [
                'article' => $gameWord['article'],
                'gameNumber' => $gameNumber,
                'nounId' => $gameWord['id'],
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
            $article = $this->app->old('article');
            $correct = $this->app->old('correct');
            $gameNumber = $this->app->old('gameNumber');
            $noun = $this->app->old('noun');
            $round = $this->app->old('round');

            $newGame = false;
            $newRound = false;


            dump($article);
            dump($correct);
            dump($gameNumber);
            dump($gameOver);
            dump($newGame);
            dump($newRound);
            dump($noun);
            dump($round);
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

    public function nextWord()
    {
    # Pull in quiz
    $inputs = $this->app->inputAll();

    # validate inputs
    $this->app->validate([
        'gameNumber' => 'required|numeric',
        'newRound' => 'required',
        'round' => 'required'
    ]);

    $gameNumber = $this->app->input('gameNumber');
    $newRound = $this->app->input('newRound');
    $nextWord = $this->app->input('nextWord');
    $round = $this->app->input('round');

    return $this->app->redirect('/', [
        'gameNumber' => $gameNumber,
        'newRound' => $newRound,
        'nextWord' => $nextWord,
        'round' => $round
    ]);

    }

    public function scorePlay()
    {
        # Pull in quiz
        $inputs = $this->app->inputAll();

        # validate inputs
        $this->app->validate([
            'article' => 'required|maxLength:4',
            'gameNumber' => 'required|numeric',
            'guess' => 'required',
            'id' => 'required|numeric',
            'noun' => 'required',
            'round' => 'required'
        ]);

        $article = $this->app->input('article');
        $gameNumber = $this->app->input('gameNumber');
        $guess = $this->app->input('guess');
        $id = $this->app->input('id');
        $noun = $this->app->input('noun');
        $round = $this->app->input('round');

        # Compare input to answer
        $correct = ($guess == $article) ? 1 : 0;
        
        # SQL statement with named parameters
        $sql = 'UPDATE games SET guess = :guess, correct = :correct WHERE gameNumber = :gameNumber AND nounId = :nounId';

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
            'correct' => $correct,
            'gameNumber' => $gameNumber,
            'guess' => $guess,
            'nounId' => $id,
            'noun' => $noun, 
            'round' => $round
        ]);
    } 
}