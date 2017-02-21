<?php

namespace App\Services;

class SMSService implements Printable, Sendable
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

