<?php

namespace App\Commands;

use App\Nouns;

class AppCommand extends Command
{

    public function fresh()
    {
        $this->migrate();
        $this->seedNouns();

        dump('It has all been refreshed!');
    }

    public function migrate()
    {

        $this->app->db()->createTable('games', [
            'timestamp' => 'timestamp',
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

    # TODO: CREATE seedGames()
}
