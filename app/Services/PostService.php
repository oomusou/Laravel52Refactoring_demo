<?php

declare(strict_types = 1);

namespace App\Services;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    /** @var  PostRepository */
    private $postRepository;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * 顯示所有文章
     * @return Collection
     */
    public function showAllPosts() : Collection
    {
        return $this->postRepository->getAllPosts();
    }

    /**
     * 顯示 id 文章的 title
     * @param int $id
     * @param string $default 若找不到資料，顯示預設值
     * @return string
     */
    public function showTitle(int $id, string $default) : string
    {
        return $this->postRepository->getTitle($id, $default);
    }

    /**
     * 顯示所有文章的 title
     */
    public function showTitlesOfAllPostsByArray() : array
    {
        $posts = $this->postRepository->getAllPosts();

        $titles = [];

        foreach ($posts as $post) {
            $titles[] = $post->title;
        }

        return $titles;
    }

    /**
     * 顯示所有文章的 title
     */
    public function showTitlesOfAllPostsByCollection() : Collection
    {
        return $this->postRepository
            ->getAllPosts()
            ->map(function (Post $post) {
                return $post->title;
            });
    }
}