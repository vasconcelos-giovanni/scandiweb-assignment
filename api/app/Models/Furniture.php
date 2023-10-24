<?php

declare(strict_types = 1);

namespace App\Models;

use PDO;

class Furniture extends Product
{
    public function __construct(
        private int $productTypeId,
        private string $sku,
        private string $name,
        private float $price,
        private int $height,
        private int $width,
        private int $length
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
        $height = $this->getHeight();
        $width = $this->getWidth();
        $length = $this->getLength();

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
                            height,
                            width,
                            length
                        )
                    VALUES
                        (
                            :productTypeId,
                            :sku,
                            :name,
                            :price,
                            :height,
                            :width,
                            :length
                        );
                SQL
            );

            $statement->bindValue(':productTypeId', $productTypeId, PDO::PARAM_INT);
            $statement->bindValue(':sku', $sku, PDO::PARAM_STR);
            $statement->bindValue(':name', $name, PDO::PARAM_STR);
            $statement->bindValue(':price', $price, PDO::PARAM_STR);
            $statement->bindValue(':height', $height, PDO::PARAM_INT);
            $statement->bindValue(':width', $width, PDO::PARAM_INT);
            $statement->bindValue(':length', $length, PDO::PARAM_INT);
            
            $statement->execute();
            
            static::$database->commit();

            return true;
        } catch (\Exception $exception) {
            static::$database->rollBack();
        }        
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;
        return $this;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;
        return $this;
    }
}
