<?php

namespace App\Services;

class SMSService
{
    public function printMessage()
    {
        echo('Print Message');
    }

    public function sendMessage() : string
    {
        return 'Send Message';
    }
}

