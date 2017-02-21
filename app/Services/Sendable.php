<?php

namespace App\Services;

interface Sendable
{
    public function sendMessage(): string;
}