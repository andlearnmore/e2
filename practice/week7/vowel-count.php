<?php

function vowelCount($word) 
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $vowelCount = 0;
    foreach ($vowels as $vowel) {
        $vowelCount = $vowelCount + substr_count(strtolower($word), $vowel);
    }
    return $vowelCount;
}

print vowelCount('dwojeski');