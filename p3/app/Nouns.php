<?php

namespace App;

class Nouns
{
    # Properties
    private $nouns = [];

    # Methods
    public function __construct($dataSource)
    {
        $json = file_get_contents($dataSource);
        $this->nouns = json_decode($json, true);
    }

    public function getAll()
    {
        return $this->nouns;
    }

    public function getById(int $id)
    {
        return $this->nouns[$id] ?? null;
    }

    public function getByNoun(string $noun)
    {
        $nounId = array_search($noun, array_column($this->nouns, 'noun', 'id'));
        return $this->getByNoun($nounId);
    }

    public function getGameArray()
    {
        # Get a new 'deck' of words from the array each time by shuffling.
        # Creating a variable so I can check if this is true/false for testing.
        $shuffle = shuffle($this->nouns);

        $length = count($this->nouns) - 1;
        $gameLength = 10;

        # I'm hardcoding $gameLength above, but if I made it dynamic, 
        # I want to make sure it's not longer than the actual array.
        if ($length >= $gameLength) {
            $gameLength = $gameLength;
        } else {
            $gameLength = $length;
        };

        $words = array_slice($this->nouns, 0, $gameLength);
        
        return $words;
    }

}