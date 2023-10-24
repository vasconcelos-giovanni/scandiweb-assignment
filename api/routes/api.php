<?php

use App\Controllers\ProductController;

$router->get('/', [ProductController::class, 'index']);

$router->post('/add-product', [ProductController::class, 'store']);
$router->post('/destroy-products', [ProductController::class, 'destroyMany']);

// $router->post(
//     '/destroy-products',
//     function () {
//         ''
//     }
// );