<?php

namespace App\Services;

class ChangeSignature
{
    public function print()
    {
        echo($this->sum(1, 2, 10));
    }

    public function sum(int $num1, int $num2, int $num3 = 0) : int
    {
        return $num1 + $num2;
    }
}