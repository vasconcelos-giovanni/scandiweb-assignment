<?php

declare(strict_types = 1);

namespace App\Services;

use App\App;
use App\Database;

class DestroyManyProductService
{
    protected static Database $database;

    public function __construct()
    {
        static::$database = App::database();
    }

    public function __invoke(array $ids)
    {
        try {
            static::$database->beginTransaction();

            $placeholders = implode(',', array_fill(0, count($ids), '?'));

            $statement = static::$database->prepare(
                "DELETE FROM products
                WHERE id IN ({$placeholders})"
            );

            $statement->execute($ids);

            static::$database->commit();

            return true;
        } catch (\Exception $exception) {
            static::$database->rollBack();
            echo 'OI';
            header("HTTP/1.1 404 Not Found");
            die;
        }
    }

}