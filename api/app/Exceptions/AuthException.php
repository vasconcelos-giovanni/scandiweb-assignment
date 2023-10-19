<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    /**
     * @return void
     */
    public static function credentialsNotMatch()
    {
        return new static('CREDENTIALS NOT MATCH');
    }
}