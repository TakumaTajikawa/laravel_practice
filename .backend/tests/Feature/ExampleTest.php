<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Person;
use Database\Factories\PersonFactory;
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
        Person::factory()->count(50)->create();
        

        $count = Person::get()->count();
        $person = person::find(rand(1, $count));
        $data = $person->toArray();
        print_r($data);

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