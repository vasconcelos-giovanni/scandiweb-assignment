<?php

namespace App\Exceptions;

use Exception;

class RouterException extends Exception
{
    /**
     * @return void
     */
    public static function routeNotFound()
    {
        return new static('ROUTE NOT FOUND');
    }

    /**
     * @param array $routeArgs Array with route method and path to be exhibited in the error message
     * @return void
     */
    public static function routeNotResolved($routeArgs)
    {
        return new static("ROUTE NOT RESOLVED in {$routeArgs[0]} \"{$routeArgs[1]}\" route");
    }
}