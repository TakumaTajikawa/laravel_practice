<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/hello')->assertOk();
        // $this->post('/hello')->assertOk();
        $this->get('/hello/1')->assertOk();
        $this->get('/hoge')->assertStatus(404);
        $this->get('/hello')->assertSeeText('Index', 'Index');
        // $this->get('/hello')->assertSee('<h1>');
        // $this->get('/hello')->assertSeeInOrder(['<html', '<head', '<body', '<h1>']);
    }
}