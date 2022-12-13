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

    public function gameOver()
    {
        return $this->app->view('/game-over');
    }

    public function gameResults()
    {
        $gameNumber = $this->app->param('id');
        $results = $this->app->db()->findbyColumn('rounds', 'gameNumber', '=', $gameNumber);
        return $this->app->view('/results', ['results' => $results, 'gameNumber' => $gameNumber]);
    }

    public function games()
    {
        $games = $this->app->db()->all('games');
        return $this->app->view('/games', ['games' => $games]);
    }

    public function index()
    {
        $nouns = $this->app->db()->all('nouns');
        $games = $this->app->db()->all('games');
        
        $newGame = true;
        $gameLength = 6;
        $gameOver = false;
        $newRound = true;

        $correct = $this->app->old('correct');
        # If there are no results ('correct'), set up a new round, otherwise, show results.
        if (is_null($correct)) {  
            $gameNumber = $this->app->old('gameNumber'); 
            if (is_null($gameNumber)) { 
                # Determine new game number by incrementing most recent one.
                $recentGameId = (reset($games));
                $gameNumber = ($recentGameId == false) ? 1 : (($recentGameId['gameNumber']) + 1);
            } else {
                $newGame = false;
                $gameNumber = $gameNumber;
            }

            # Determine round number and check if game is over.
            $round = $this->app->old('round');
            if ($newGame == true) {
                $round = 1;
            } else {
                $round = $round++;
                $gameOver = ($round < $gameLength) ? false : true;
                if ($gameOver == true) {

                    # Add up the number of correct guesses for current game using rounds table.
                    $roundResults = $this->app->db()->findByColumn('rounds', 'gameNumber', '=', $gameNumber);
                    foreach ($roundResults as $roundResult) {
                        $guesses []= $roundResult['correct'];
                    }
                    $correctGuesses = array_sum($guesses);
                    $total = count($roundResults);

                    $this->app->db()->insert('games', [
                        'timestamp' => date('Y-m-d H:i:s'),
                        'gameNumber' => $gameNumber,
                        'correctGuesses' => $correctGuesses,
                        'total' => $total
                    ]);
        
                    return $this->app->view('/game-over', [ 'gameOver' => $gameOver, 'newGame' => false]);
                }
            }
    
            # Select a random word key from nouns and get the word details.
            $key = array_rand($nouns, 1);
            $gameWord = $nouns[$key];

            return $this->app->view('/index', [
                'gameWord' => $gameWord,
                'gameNumber' => $gameNumber,
                'gameOver' => $gameOver,
                'newGame' => $newGame,
                'newRound' => $newRound,
                'round' => $round
            ]);
        } else { # If there are results, show them
            $article = $this->app->old('article');
            $correct = $this->app->old('correct');
            $gameNumber = $this->app->old('gameNumber');
            $guess = $this->app->old('guess');
            $newGame = false;
            $newRound = false;
            $noun = $this->app->old('noun');
            $round = ($this->app->old('round')) + 1;

            return $this->app->view('/index', [
                'article' => $article,
                'correct' => $correct,
                'gameNumber' => $gameNumber,
                'gameOver' => $gameOver,
                'guess' => $guess,
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

        $gameNumber = $this->app->input('gameNumber');
        $newGame = false;
        $newRound = $this->app->input('newRound');
        $round = $this->app->input('round');

        return $this->app->redirect('/', [
            'gameNumber' => $gameNumber,
            'newGame' => $newGame,
            'newRound' => $newRound,
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
        $newGame = false;
        $noun = $this->app->input('noun');
        $round = $this->app->input('round');

        # Compare input to answer.
        $correct = ($guess == $article) ? 1 : 0;

        # Delete any round data if game was restarted.
        $roundsData = $this->app->db()->findByColumn('rounds', 'gameNumber', '=', $gameNumber);
        if ($roundsData) {
            if ($roundsData[0]['round'] == $round) {
                $sql = 'DELETE FROM rounds WHERE gameNumber = :gameNumber';

                $data = [
                    'gameNumber' => $gameNumber,
                ];

                $executed = $this->app->db()->run($sql, $data);
            }
        }
   
        # Insert the new game word and details into the DB.
        $this->app->db()->insert('rounds', [
            'article' => $article,
            'correct' => $correct,
            'gameNumber' => $gameNumber,
            'guess' => $guess,
            'nounId' => $id,
            'noun' => $noun,
            'round' => $round,
        ]);
        
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