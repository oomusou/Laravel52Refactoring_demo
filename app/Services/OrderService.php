<?php

namespace App\Services;

class OrderService
{
    /**
     * @param string $type
     * @param int $days
     * @return int
     */
    public function calculatePrice(string $type, int $days): int
    {
        if ($type == 'Regular') {
            return ($days - 7) * 10;
        } elseif ($type == 'NewRelease') {
            return ($days - 3) * 30;
        } elseif ($type == 'Children') {
            return ($days - 7) * 10;
        }
    }
}