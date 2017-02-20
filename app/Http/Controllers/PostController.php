<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Services\PostService;
use View;

class PostController extends Controller
{
    /** @var PostService */
    private $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * 顯示所有文章
     * @return View
     */
    public function index()
    {
        $data['posts'] = $this->postService->showAllPosts();
        return view('posts.index', $data);
    }

    /**
     * 顯示 id 文章的 title
     * @param $id
     * @return View
     */
    public function show(string $id)
    {
        $data['title'] = $this->postService->showTitle((int)$id, 'no title');
        return view('posts.show', $data);
    }

    /**
     * 顯示所有文章的 title
     * @return View
     */
    public function titles()
    {
        $data['titles'] = $this->postService->showTitlesOfAllPostsByCollection();
        return view('posts.titles', $data);
    }
}
