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

    abstract public function create(): true;

    public function getProductId(): int
    {
        return $this->productTypeId;
    }
 
    public function setProductId(int $productTypeId): self
    {
        $this->productTypeId = $productTypeId;

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
 
    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

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

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}