<?php

use App\Models\Test;

$router->get(
    '/test',
    function () {
        $test = new Test('jamais');
        $test->create();

        return $test->getMyColumn();
        // return 'oi';
    }
);