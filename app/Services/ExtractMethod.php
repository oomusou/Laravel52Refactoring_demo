<?php

namespace App\Services;

class ExtractMethod
{
    public function printOwing(string $name)
    {
        $this->printBanner();

        // print details
        $this->printDetails($name);
    }

    /**
     * @param string $name
     */
    private function printDetails(string $name)
    {
        print("name:  " . $name);
        print("amount " . $this->getOutstanding());
    }
}