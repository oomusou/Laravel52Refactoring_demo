<?php

namespace App\Services;

class ExtractParameter
{
    public function Calculate(int $i, int $c)
    {
        while ($i < $c) {
            $i = $i + 1;
            return $i;
        };
    }

    public function DisplaySum()
    {
        $a = 1;
        $result = $this->Calculate($a, 10);

        echo "The final result is " . $result;
    }
}