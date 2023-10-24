<?php

declare(strict_types = 1);

namespace App\Services;

use App\Helpers\Debug;
use App\Models\Dvd;

class CreateDvdService
{
    public function __invoke()
    {
        $productTypeId = (int) $_POST['productTypeId'];
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = (float) $_POST['price'];
        $size = (int) $_POST['size'];


        $dvd = new Dvd(
            $productTypeId,
            $sku,
            $name,
            $price,
            $size
        );
        
        $dvd->create();
    }
}