<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    /**
     * 回傳 id 的文章 title
     * @param int $id
     * @param string $default
     * @return string
     */
    public function getTitle(int $id, string $default) : string
    {
        return Post::whereId($id)
            ->get()
            ->first(null, new Post(['title' => $default]))
            ->title;
    }

    /**
     * 回傳所有文章
     * @return Collection|Post[]
     */
    public function getAllPosts() : Collection
    {
        return Post::all();
    }
}