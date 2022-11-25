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
        dump($this->getByNoun($nounId));
        return $this->getByNoun($nounId);
    }

    // public function getArticle(string $nounId)
    // {
    //     getByNoun($nounId); # I think this returns a nounId, which I'll use next
    //     # Take the nounId and look in the array
    //     $nounArticle = array_search($nounId, array_column($this->nouns, 'nounId', 'article')); 
    // }
}