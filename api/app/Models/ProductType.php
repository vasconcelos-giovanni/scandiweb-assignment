<?php

declare(strict_types = 1);

namespace App\Models;

use App\Model;
use PDO;

class ProductType extends Model
{
    private int $id;
    private string $name;

    public function find(int $id): self
    {
        static::$database->beginTransaction();

        $statement = static::$database->prepare(
            <<<SQL
                SELECT *
                FROM product_types
                WHERE
                    id = :id
            SQL
        );

        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        static::$database->commit();

        $results = $statement->fetchAll();
        if ($results !== []) {
            $this->setId($results[0]['id']);
            $this->setName($results[0]['name']);
        }

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}