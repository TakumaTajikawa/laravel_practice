<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyServiceInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class HelloController extends Controller
{
    // public function __construct(
    //     // MyServiceInterface $myService
    // ){
    //     // $this->myService = $myService;
    // }

    public function index(Request $request)
    {
        $msg = 'show people record';
        $re = Person::get();
        $fields = Person::get()->fields();

        return view('hello.index')
            ->with([
                'msg' => implode(', ', $fields),
                'data' => $re
            ]);
    }

    public function saving()
    {
        $person = new Person();
        $person->all_data = ['山崎泰明','bbbbb@ccc.com',1234];
        $person->save();

        return redirect()->route('hello');
    }

    public function save(int $id, string $name)
    {
        $record = Person::find($id);
        $record->name = $name;
        $record->save();
        return redirect()->route('hello');
    }

    public function json(int $id = 0)
    {
        dd(123);
        if ($id === 0){
            return Person::get()->toJson();
        } else {
            return Person::find($id)->toJson();
        }
    }
}
