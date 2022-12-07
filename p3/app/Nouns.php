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

    # USED
    public function getAll()
    {
        return $this->nouns;
    }

    public function getById(int $id)
    {
        return $this->nouns[$id] ?? null;
    }

    # Do I need this?
    public function getByNoun(string $noun)
    {
        $nounId = array_search($noun, array_column($this->nouns, 'noun', 'id'));
        return $this->getById($nounId);
    }


}