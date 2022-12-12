<?php

namespace App\Commands;

use App\Nouns;
use Faker\Factory;

class AppCommand extends Command
{

    public function fresh()
    {
        $this->migrate();
        $this->seedNouns();
        $this->seedGames();

        dump('It has all been refreshed!');
    }

    public function migrate()
    {

        $this->app->db()->createTable('games', [
            'timestamp' => 'date',
            'gameNumber' => 'int',
            'round' => 'int',
            'nounId' => 'int',
            'noun' => 'varchar(255)',
            'article' => 'varchar(3)',
            'guess' => 'varchar(255)',
            'correct' => 'tinyint(1)'
        ]);

        $this->app->db()->createTable('nouns', [
            'noun' => 'varchar(255)',
            'article' => 'varchar(3)',
            'plural' => 'varchar(255)',
            'english' => 'varchar(255)'
        ]);

        dump('Migration complete. Check the database for your new table(s).');
    }

    public function seedNouns()
    {
        $nouns = new Nouns($this->app->path('database/nouns.json'));

        foreach ($nouns->getAll() as $noun) {
            $this->app->db()->insert('nouns', $noun);
        }

        dump('The Nouns table has been seeded. Check it out!');
    }

    public function seedGames()
    {
        $faker = Factory::create();


        for ($i = 0; $i < 5; $i++) {
            $this->app->db()->insert('games', [
                'article' => $faker->randomElement(['der', 'die', 'das']),
                'correct' => $faker->numberBetween(0,1),
                'gameNumber' => 0,
                'guess' => $faker->randomElement(['der', 'die', 'das']),
                'noun' => $faker->randomElement(['Kuh', 'Ente', 'Tiger', 'Löwe', 'Pferd']),
                'nounId' => $faker->numberBetween(0,9),
                'round' => $i,
                'timestamp' => '2022-12-06'
            ]);
        }

        dump('The Games table has been seeded. Check it out!');

    }

    # TODO: CREATE seedGames()
}
