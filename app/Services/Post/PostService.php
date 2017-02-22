<?php

declare(strict_types = 1);

namespace App\Services\Post;

use App\Services\Sendable;

class PostService extends AbstractPostService
{
    /** @var Sendable */
    protected $SMSService;

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
