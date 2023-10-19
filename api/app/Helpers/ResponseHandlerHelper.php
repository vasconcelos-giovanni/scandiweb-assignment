<?php

namespace App\Helpers;

class ResponseHandlerHelper
{
    /**
     * An extension of the PHP built-in function `header()` with the following calling of `die()`.
     *
     * @param string $header
     * @param boolean $replace
     * @param integer $response_code
     * @return void
     */
    public static function redirect($header, $replace = true, $response_code = 0)
    {
        header($header, $replace, $response_code);
        die();
    }
}