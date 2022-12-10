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

    public function play()
    {
        # Get all nouns from DB. 
        # Likely a bad model as the DB grows, but for a small one, I'm using this to make sure there are 
        # enough words in the DB for a game of $gameLength.
        $nouns = $this->app->db()->all('nouns');

        $nounsLength = count($nouns);
        $gameLength = 2;
        
        # Get array of random keys from $nouns array, shuffle these so words aren't always in same order.
        $keys = ($nounsLength >= $gameLength) ? array_rand($nouns, $gameLength) : array_rand($nouns, $nounsLength);
        shuffle($keys);

        foreach ($keys as $key) {
            $gameWords[] = $nouns[$key];
        }
        dump($gameWords);

        $games = $this->app->db()->all('games');

        dump($games);

        $recentGameId = (reset($games));
        dump($recentGameId);
        // dump($recentGameId['id']);
       
        # Determine game number by incrementing most recent one.
        $game_number = (empty($recentGameId)) ? 0 : (($recentGameId['game_number']) + 1);

        dump($game_number);

        foreach ($gameWords as $gameWord) {
            $this->app->db()->insert('games', [
                'game_number' => $game_number,
                'noun_id' => $nouns[$key]['id'],
                'noun' => $nouns[$key]['noun'],
                'article' => $nouns[$key]['article']
            ]);
        };

        return $this->app->view('/nouns/play', [
            'gameWords' => $gameWords
        ]);
    }

    public function scorePlay()
    {
        dd($this->app->inputAll());
            # Persist to games table
            # Pull in quiz
            # Process form inputs
            # Check quiz (answers) vs inputs (guesses)
            # Return results 
        return $this->app->redirect();
    }
}