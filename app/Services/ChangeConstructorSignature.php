<?php

namespace App\Services;

class ChangeConstructorSignature
{
    /** @var PostService */
    private $postService;

    /**
     * ChangeConstructorSignature constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
}