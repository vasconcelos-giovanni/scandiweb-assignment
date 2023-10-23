<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Services\ProductService;

class ProductController
{
    public function index()
    {
        $product = new ProductService();
        $products = json_encode($product->all());

        return $products;
    }

    public function store()
    {
        
    }

    public function deleteMany()
    {
        
    }
}