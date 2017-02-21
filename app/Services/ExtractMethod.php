<?php

namespace App\Services;

class ExtractMethod
{
    public function printOwing(string $name)
    {
        $this->printBanner();

        // print details
        print("name:  " . $name);
        print("amount " . $this->getOutstanding());
    }
}