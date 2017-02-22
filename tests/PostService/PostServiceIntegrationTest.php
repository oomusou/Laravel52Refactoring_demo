<?php

use App\Services\Post\PostService;
use App\Services\SMSService;

class PostServiceIntegrationTest extends TestCase
{
    /** @var \App\Services\Post\PostService */
    protected $target;

    protected function setUp()
    {
        parent::setUp();
        $SMSService = new SMSService();
        $this->target = new PostService($SMSService);
    }

    /** @test */
    public function 顯示正確簡訊()
    {
        /** arrange */

        /** act */
        $actual = $this->target->showMessage();

        /** assert */
        $expected = 'Send Message';
        $this->assertEquals($expected, $actual);
    }
}