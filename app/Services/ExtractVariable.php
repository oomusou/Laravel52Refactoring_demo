<?php

namespace App\Services;

class ExtractVariable
{
    public function Calculate(int $i)
    {
        $c = 10;
        while ($i < $c) {
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