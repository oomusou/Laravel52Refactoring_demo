<?php

namespace App\Services;

class ChangeSignature
{
    public function print()
    {
        echo($this->sum(1, 2));
    }

    public function sum(int $num1, int $num2) : int
    {
        return $num1 + $num2;
    }
}