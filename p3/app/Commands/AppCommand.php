<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function test()
    {
        dump('It works! You invoked your first command.');
    }

    public function migrate()
    {
        $this->app->db()->createTable('nouns', [
            'noun' => 'varchar(255)',
            'article' => 'varchar(3)',
            'plural' => 'varchar(255)',
            'english' => 'varchar(255)'
        ]);

        dump('Migration complete. Check the database for your new table(s).');
    }
}
