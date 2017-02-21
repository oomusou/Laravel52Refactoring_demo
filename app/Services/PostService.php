<?php

declare(strict_types = 1);

namespace App\Services;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

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
