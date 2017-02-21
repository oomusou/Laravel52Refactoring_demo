<?php

namespace App\Services;

class ChangeConstructorSignature
{
    /** @var PostService */
    private $postService;
    /** @var SMSService */
    private $SMSService;

    /**
     * ChangeConstructorSignature constructor.
     * @param PostService $postService
     * @param SMSService $SMSService
     */
    public function __construct(PostService $postService, SMSService $SMSService)
    {
        $this->postService = $postService;
        $this->SMSService = $SMSService;
    }
}