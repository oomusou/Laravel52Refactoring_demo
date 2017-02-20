<?php

declare(strict_types = 1);

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostServiceApplicationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function 回傳全部3筆文章()
    {
        /** arrange */
        $posts = factory(Post::class, 3)->create();

        /** act */
        $this->visit('/posts');

        /** assert */
        $posts->each(function (Post $post) {
            $this->see($post->title)
                ->see($post->content)
                ->see($post->description);
        });

    }

    /** @test */
    public function 當id為1時應回傳title1()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $this->visit('/posts/1');

        /** assert */
        $this->see('Title : title1');
    }

    /** @test */
    public function 當id為4時應回傳no_title()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $this->visit('/posts/4');

        /** assert */
        $this->see('Title : no title');
    }

    /** @test */
    public function 由Collection回傳全部3筆titles()
    {
        /** arrange */
        $posts = factory(Post::class, 3)->create();

        /** act */
        $this->visit('/posts/titles');

        /** assert */
        $posts->each(function (Post $post) {
            $this->see($post->title);
        });
    }
}
