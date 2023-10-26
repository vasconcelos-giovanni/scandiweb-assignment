<?php

declare(strict_types = 1);

namespace App\Models;

use PDO;

class Dvd extends Product
{
    public function __construct(
        private string $sku,
        private string $name,
        private float $price,
        private int $size
    )
    {      
        parent::__construct(
            $sku,
            $name,
            $price
        );
    }

    public function create(): true
    {
        $sku = $this->getSku();
        $name = $this->getName();
        $price = $this->getPrice();
        $size = $this->getSize();

        try {
            self::$database->beginTransaction();

            $statement = self::$database->prepare(
                <<<SQL
                    INSERT INTO products
                        (
                            sku,
                            name,
                            price,
                            size
                        )
                    VALUES
                        (
                            :sku,
                            :name,
                            :price,
                            :size
                        );
                SQL
            );

            $statement->bindValue(':sku', $sku, PDO::PARAM_STR);
            $statement->bindValue(':name', $name, PDO::PARAM_STR);
            $statement->bindValue(':price', $price, PDO::PARAM_STR);
            $statement->bindValue(':size', $size, PDO::PARAM_INT);
            
            $statement->execute();
            
            static::$database->commit();

            return true;
        } catch (\Exception $exception) {
            static::$database->rollBack();
        }
        
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }
}