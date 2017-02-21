<?php

declare(strict_types = 1);

namespace App\Services;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /** @var SMSService */
    private $SMSService;

    /**
     * PostService constructor.
     * @param SMSService $SMSService
     */
    public function __construct(SMSService $SMSService)
    {
        $this->SMSService = $SMSService;
    }

    public function showMessage()
    {
        return $this->SMSService->sendMessage();
    }
}
