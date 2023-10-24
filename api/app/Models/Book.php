<?php

declare(strict_types = 1);

namespace App\Models;

use PDO;

class Book extends Product
{
    public function __construct(
        private int $productTypeId,
        private string $sku,
        private string $name,
        private float $price,
        private float $weight
    )
    {      
        parent::__construct(
            $productTypeId,
            $sku,
            $name,
            $price
        );
    }

    public function create(): true
    {
        $productTypeId = $this->getProductId();
        $sku = $this->getSku();
        $name = $this->getName();
        $price = $this->getPrice();
        $weight = $this->getWeight();

        try {
            self::$database->beginTransaction();

            $statement = self::$database->prepare(
                <<<SQL
                    INSERT INTO products
                        (
                            product_type_id,
                            sku,
                            name,
                            price,
                            weight
                        )
                    VALUES
                        (
                            :productTypeId,
                            :sku,
                            :name,
                            :price,
                            :weight
                        );
                SQL
            );

            $statement->bindValue(':productTypeId', $productTypeId, PDO::PARAM_INT);
            $statement->bindValue(':sku', $sku, PDO::PARAM_STR);
            $statement->bindValue(':name', $name, PDO::PARAM_STR);
            $statement->bindValue(':price', $price, PDO::PARAM_STR);
            $statement->bindValue(':weight', $weight, PDO::PARAM_STR);
            
            $statement->execute();
            
            static::$database->commit();

            return true;
        } catch (\Exception $exception) {
            static::$database->rollBack();
        }
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;
        return $this;
    }
}
