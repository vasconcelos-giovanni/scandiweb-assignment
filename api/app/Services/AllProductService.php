<?php

declare(strict_types = 1);

namespace App\Services;

use App\App;
use App\Database;

class AllProductService
{
    protected static Database $database;

    public function __construct()
    {
        static::$database = App::database();
    }

    public function __invoke(): array
    {
        try {
            static::$database->beginTransaction();

            $statement = static::$database->prepare(
                <<<SQL
                    SELECT
                        *
                    FROM
                        products;
                SQL
            );
            
            $statement->execute();

            $results = $statement->fetchAll();
            
            static::$database->commit();

            return $results;
        } catch (\Exception $exception) {
            static::$database->rollBack();
            return [];
        }
    }
}