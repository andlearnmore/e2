<?php

namespace App\Commands;

use App\Nouns;
use Faker\Factory;

class AppCommand extends Command
{

    public function fresh()
    {
        $this->migrate();
        $this->seedGames();
        $this->seedNouns();
        $this->seedRounds();

        dump('It has all been refreshed!');
    }

    public function migrate()
    {
        $this->app->db()->createTable('games', [
            'timestamp' => 'timestamp',
            'gameNumber' => 'int',
            'correctGuesses' => 'int',
            'total' => 'int'
        ]);
        
        $this->app->db()->createTable('nouns', [
            'noun' => 'varchar(255)',
            'article' => 'varchar(3)',
            'plural' => 'varchar(255)',
            'english' => 'varchar(255)'
        ]);

        $this->app->db()->createTable('rounds', [
            'gameNumber' => 'int',
            'round' => 'int',
            'nounId' => 'int',
            'noun' => 'varchar(255)',
            'article' => 'varchar(3)',
            'guess' => 'varchar(255)',
            'correct' => 'tinyint(1)'
        ]);

        dump('Migration complete. Check the database for your new table(s).');
    }

    public function seedGames()
    {
        $faker = Factory::create();

        for ($i = 0; $i <7 ; $i++) {
            $this->app->db()->insert('games', [
                'timestamp' => $faker->dateTimeBetween('-'.$i.' days', 'now')->format('Y-m-d H:i:s'),
                'gameNumber' => $i + 1,
                'correctGuesses' => $faker->numberBetween(0, 5),
                'total' => 5
            ]);
        }

        dump('The Games table has been seeded. Check it out!');

    }

    public function seedRounds()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $this->app->db()->insert('rounds', [
                'gameNumber' => 0,
                'round' => $i,
                'nounId' => $faker->numberBetween(20,30),
                'noun' => $faker->randomElement(['Kuh', 'Ente', 'Tiger', 'Löwe', 'Pferd']),
                'article' => $faker->randomElement(['der', 'die', 'das']),
                'guess' => $faker->randomElement(['der', 'die', 'das']),
                'correct' => $faker->numberBetween(0,1)
            ]);
        }

        dump('The Rounds table has been seeded. Check it out!');

    }

    public function seedNouns()
    {
        $nouns = new Nouns($this->app->path('database/nouns.json'));

        foreach ($nouns->getAll() as $noun) {
            $this->app->db()->insert('nouns', $noun);
        }

        dump('The Nouns table has been seeded. Check it out!');
    }
}
