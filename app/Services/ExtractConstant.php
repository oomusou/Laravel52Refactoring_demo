<?php

namespace App\Services;

class ExtractConstant
{
    const GRAVITATIONAL_CONSTANT = 9.81;

    public function potentialEnergy(int $mass, int $height): float
    {
        return $mass * $height * self::GRAVITATIONAL_CONSTANT;
    }
}