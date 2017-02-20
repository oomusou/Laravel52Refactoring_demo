<?php

declare(strict_types = 1);

use App\Post;
use App\Services\PostService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostServiceIntegrationTest extends TestCase
{
    use DatabaseMigrations;

    /** @var PostService */
    protected $target;

    protected function setUp()
    {
        parent::setUp();
        $this->target = App::make(PostService::class);
    }


    /** @test */
    public function 回傳全部3筆文章()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $actual = $this->target
            ->showAllPosts()
            ->pick(['title', 'description', 'content'])
            ->all();

        /** assert */
        $expected = [
            ['title1', 'description1', 'content1'],
            ['title2', 'description2', 'content2'],
            ['title3', 'description3', 'content3'],
        ];
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 當id為1時應回傳title1()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $id = 1;
        $default = 'no title';
        $actual = $this->target->showTitle($id, $default);

        /** assert */
        $expected = 'title1';
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 當id為4時應回傳no_title()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $id = 4;
        $default = 'no title';
        $actual = $this->target->showTitle($id, $default);

        /** assert */
        $expected = 'no title';
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 由陣列回傳全部3筆titles()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $actual = $this->target->showTitlesOfAllPostsByArray();

        /** assert */
        $expected = [
            'title1',
            'title2',
            'title3'
        ];
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 由Collection回傳全部3筆titles()
    {
        /** arrange */
        factory(Post::class, 3)->create();

        /** act */
        $actual = $this->target->showTitlesOfAllPostsByCollection();

        /** assert */
        $expected = new Collection([
            'title1',
            'title2',
            'title3'
        ]);
        $this->assertEquals($expected, $actual);
    }
}
