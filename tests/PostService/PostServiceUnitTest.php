<?php

declare(strict_types = 1);

use App\Post;
use App\Repositories\PostRepository;
use App\Services\Post\PostService;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Mock;

class PostServiceUnitTest extends TestCase
{
    /** @var \App\Services\Post\PostService $target */
    protected $target;

    /** @var Mock */
    protected $mockPostRepository;

    protected function setUp()
    {
        parent::setUp();
        $this->mockPostRepository = Mockery::mock(PostRepository::class);
        App::instance(PostRepository::class, $this->mockPostRepository);
        $this->target = App::make(PostService::class);
    }


    /** @test */
    public function 回傳全部3筆文章()
    {
        /** arrange */
        $posts = factory(Post::class, 3)->make();

        /** assume */
        $this->mockPostRepository
            ->shouldReceive('getAllPosts')
            ->once()
            ->withAnyArgs()
            ->andReturn($posts);

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

        /** assume */
        $this->mockPostRepository
            ->shouldReceive('getTitle')
            ->once()
            ->withAnyArgs()
            ->andReturn('title1');

        /** act */
        $id = 1;
        $default = 'title1';
        $actual = $this->target->showTitle($id, $default);

        /** assert */
        $expected = 'title1';
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 當id為4時應回傳no_title()
    {
        /** arrange */

        /** assume */
        $this->mockPostRepository
            ->shouldReceive('getTitle')
            ->once()
            ->withAnyArgs()
            ->andReturn('no title');

        /** act */
        $id = 4;
        $default = 'no title';
        $actual = $this->target->showTitle($id, $default);

        /** assert */
        $expected = 'no title';
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 由Array回傳3筆titles()
    {
        /** arrange */
        $posts = factory(Post::class, 3)->make();

        /** assume */
        $this->mockPostRepository
            ->shouldReceive('getAllPosts')
            ->once()
            ->withAnyArgs()
            ->andReturn($posts);

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
        $posts = factory(Post::class, 3)->make();

        $this->mockPostRepository
            ->shouldReceive('getAllPosts')
            ->once()
            ->withAnyArgs()
            ->andReturn($posts);

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
