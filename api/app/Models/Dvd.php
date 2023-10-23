<?php

declare(strict_types = 1);

namespace App\Models;

use App\Model;
use App\Helpers\Debug;

class Dvd extends Product
{
    public function __construct(
        private int $productTypeId,
        private string $sku,
        private string $name,
        private float $price,
        private int $size
    )
    {      
        parent::__construct(
            $productTypeId,
            $sku,
            $name,
            $price
        );
    }

    public function create(): true|string
    {
        $productTypeId = $this->getProductId();
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
                            product_type_id,
                            sku,
                            name,
                            price,
                            size
                        )
                    VALUES
                        (
                            :productTypeId,
                            :sku,
                            :name,
                            :price,
                            :size
                        );
                SQL
            );

            $statement->bindValue(':productTypeId', $productTypeId);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':size', $size);
            
            $statement->execute();
            
            Debug::dd('Deu certo!');
            self::$database->commit();

            return true;
            // return (int) self::$database->lastInsertId();
        } catch (\Exception $exception) {
            Debug::pd($exception->getMessage());
            self::$database->rollBack();
            return $exception->getMessage();
        }
    }

    public function delete()
    {

    }

        /**
         * Get the value of size
         */ 
        public function getSize()
        {
                return $this->size;
        }

        /**
         * Set the value of size
         *
         * @return  self
         */ 
        public function setSize($size)
        {
                $this->size = $size;

                return $this;
        }
}