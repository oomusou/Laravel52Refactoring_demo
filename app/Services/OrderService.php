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
        switch ($type) {
            case 'Regular':
                return ($days - 7) * 10;
            case 'NewRelease':
                return ($days - 3) * 30;
            case 'Children':
                return ($days - 7) * 10;
        }
    }
}