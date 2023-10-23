<?php

declare(strict_types = 1);

namespace App\Services;

use App\App;
use App\Database;

class ProductService
{
    protected static Database $database;

    public function __construct()
    {
        static::$database = App::database();
    }

    public function all()
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
            return $exception->getMessage();
        }
    }

    public function deleteMany(array $ids)
{
    try {
        static::$database->beginTransaction();

        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $statement = static::$database->prepare(
            "DELETE FROM scandiweb_assignment.products
            WHERE id IN ({$placeholders})"
        );

        $statement->execute($ids);

        static::$database->commit();

        return true;
    } catch (\Exception $exception) {
        static::$database->rollBack();
        return $exception->getMessage();
    }
}

}