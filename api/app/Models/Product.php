<?php

declare(strict_types = 1);

namespace App\Models;

use App\Model;
use App\Helpers\Debug;

abstract class Product extends Model
{
    private int $id;

    public function __construct(
        private int $productTypeId = 0,
        private string $sku = '',
        private string $name = '',
        private float $price = 0
    )
    {
        parent::__construct();
        $this->setId(0);
    }

    abstract public function create(): true|string;



    /**
     * Get the value of productTypeId
     */ 
    public function getProductId()
    {
            return $this->productTypeId;
    }

    /**
     * Set the value of productTypeId
     *
     * @return  static
     */ 
    public function setProductId($productTypeId)
    {
            $this->productTypeId = $productTypeId;

            return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
            return $this->id;
    }

    /**
     * Set the value of idpro
     *
     * @return  static
     */ 
    public function setId($id)
    {
            $this->id = $id;

            return $this;
    }

    /**
     * Get the value of sku
     */ 
    public function getSku()
    {
            return $this->sku;
    }

    /**
     * Set the value of sku
     *
     * @return  static
     */ 
    public function setSku($sku)
    {
            $this->sku = $sku;

            return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
            return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  static
     */ 
    public function setName($name)
    {
            $this->name = $name;

            return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
            return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  static
     */ 
    public function setPrice($price)
    {
            $this->price = $price;

            return $this;
    }
}