<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function test()
    {
        dump('It works! You invoked your first command :) ');
    }

    public function migrate()
    {
        dump('You ran the migrate command');
    }
}
