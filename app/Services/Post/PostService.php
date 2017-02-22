<?php

declare(strict_types = 1);

namespace App\Services\Post;

use App\Services\Sendable;

class PostService
{
    /** @var Sendable */
    private $SMSService;

    /**
     * PostService constructor.
     * @param Sendable $SMSService
     */
    public function __construct(Sendable $SMSService)
    {
        $this->SMSService = $SMSService;
    }

    public function showMessage()
    {
        return $this->SMSService->sendMessage();
    }
}
