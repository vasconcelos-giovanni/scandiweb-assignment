<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Book;

class CreateBookService
{
    public function __invoke()
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = (float) $_POST['price'];
        $weight = (int) $_POST['weight'];

        $book = new Book(
            $sku,
            $name,
            $price,
            $weight
        );

        $book->create();
    }
}
