<?php

namespace App;

use App\Database;

abstract class Model
{
    protected Database $database;

    public function __construct()
    {
        $this->database = App::database();
    }

    abstract public function create();

    // abstract public function update($id, $data);

    // abstract public function delete($id);

    // abstract public function find($id);

    // abstract public function all();
}