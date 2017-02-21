<?php

namespace App\Services;

class ExtractVariable
{
    public function Calculate(int $i)
    {
        while ($i < 10) {
            $i = $i + 1;
            return $i;
        };
    }

    public function DisplaySum()
    {
        $a = 1;
        $result = $this->Calculate($a);

        echo "The final result is " . $result;
    }
}