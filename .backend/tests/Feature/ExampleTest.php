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
      
        $this->assertDatabaseHas('peoples', [
            'email' => 'taro@yamdada.com',
            'age' => 34,
        ]);
    }

    // public function modelTest()
    // {
    //     $data = [
    //         'id' => 1,
    //         'name' => '山田太郎',
    //         'mail' => 'taro@yamda.com',
    //         'age' => 34
    //     ];
    //     $this->assertDatabaseHas('peoples', $data);
    // }
}