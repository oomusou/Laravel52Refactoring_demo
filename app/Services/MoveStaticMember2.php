<?php

namespace App\Services;

class MoveStaticMember2
{
    public static $var1 = 'Hello World';

    public static function print()
    {
        echo(self::$var1);
    }
}