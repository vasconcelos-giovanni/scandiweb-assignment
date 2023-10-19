<?php

namespace App\Exceptions;

use Exception;

class ViewException extends Exception
{
    /**
     * @return void
     */
    public static function viewNotFound()
    {
        return new static('VIEW NOT FOUND');
    }
}