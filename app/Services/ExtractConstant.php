<?php

namespace App\Services;

class ExtractConstant
{
    public function potentialEnergy(int $mass, int $height): float
    {
        return $mass * $height * 9.81;
    }
}