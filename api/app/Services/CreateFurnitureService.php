<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Furniture;

class CreateFurnitureService
{
    public function __invoke()
    {
        $productTypeId = (int) $_POST['productTypeId'];
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = (float) $_POST['price'];
        $height = (int) $_POST['height'];
        $width = (int) $_POST['width'];
        $length = (int) $_POST['length'];

        $furniture = new Furniture(
            $productTypeId,
            $sku,
            $name,
            $price,
            $height,
            $width,
            $length
        );

        $furniture->create();
    }
}