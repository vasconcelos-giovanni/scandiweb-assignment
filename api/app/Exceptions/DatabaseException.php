<?php

namespace App\Exceptions;

use Exception;

class DatabaseException extends Exception
{
    /**
     * @return void
     */
    public static function connectionNotEstablished()
    {
        return new static('DATABASE CONNECTION NOT ESTABLISHED');
    }

    /**
     * @return void
     */
    public static function queryProcessing()
    {
        return new static('QUERY NOT PROCESSED');
    }
}