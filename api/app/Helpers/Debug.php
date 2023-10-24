<?php

namespace App\Helpers;

class Debug
{
    /**
     * Dump and die
     * 
     * Call `var_dump()` for the value and and then `die()`
     *
     * @param mixed $data Value to be debugged
     * @return void
     */
    public static function dd($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        die;
    }

    /**
     * Print and die
     * 
     * Call `print_r()` for the value and and then `die()`
     *
     * @param mixed $data Value to be debugged
     * @return void
     */
    public static function pd($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';

        die;
    }
}