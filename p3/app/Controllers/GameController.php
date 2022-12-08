<?php

namespace App\Controllers;

use App\Nouns;

class GameController extends NounsController 
{

    public function createGame()
    {

        $nouns = $this->app->db()->all('nouns');
        
        $nounsLength = count($nouns);
        $gameLength = 10;

        if ($nounsLength >= $gameLength) {
            $keys = array_rand($nouns, $gameLength);
            shuffle($keys);
        } else {
            $keys = array_rand($nouns, $nounsLength);
            shuffle($keys);
        }

        foreach ($keys as $key) {
            $this->game[] = $nouns[$key];
        }

        return $this->app->view('nouns/der-die-das', [
            'gameWords' => $this->game
        ]);

    }

    public function scorePlay()
    {
        return('You submitted the form!');
        # Pull in quiz
        # Process form inputs
        # Check quiz (answers) vs inputs (guesses)
        # Return results 
    
    }


}