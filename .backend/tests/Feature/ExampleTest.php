<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Person;
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
        $person = Person::find(2);
        $data = $person->toArray();
        $this->assertDatabaseHas('peoples', $data);

        $person->delete();
        $this->assertDatabaseMissing('peoples', $data);
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