<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\ProductType;
use App\Services\AllProductService;
use App\Services\DestroyManyProductService;

class ProductController
{
    public function index(): string
    {
        $product = new AllProductService();
        $products = json_encode($product());

        header('Content-Type: application/json');
        return $products;
    }

    public function store(): void
    {
        $productTypeId = (int) $_POST['productTypeId'];
        
        $productType = new ProductType();
        $productTypeName = $productType->find($productTypeId)->getName();
        
        $class = SERVICES_NAMESPACE . 'Create' . ucfirst($productTypeName) . 'Service';        
        if (class_exists($class)) {
            $class = new $class();

            $class();
        }

        header("HTTP/1.1 303 See Other");
        header('Location: ' . BASE_CLIENT_URL);
        die;
    }
    

    public function destroyMany(): void
    {
        if (isset($_POST['productTypeIds'])) {
            $productTypeIds = $_POST['productTypeIds'];
    
            $products = new DestroyManyProductService();
    
            $products($productTypeIds);         
        }

        header("HTTP/1.1 303 See Other");
        header('Location: ' . BASE_CLIENT_URL);
        die;
    }
}