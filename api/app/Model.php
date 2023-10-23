<?php

namespace App;

use App\Database;

abstract class Model
{
    protected static Database $database;

    public function __construct()
    {
        static::$database = App::database();
    }
}