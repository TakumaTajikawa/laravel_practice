<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyServiceInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Jobs\MyJob;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    // public function __construct(
    //     // MyServiceInterface $myService
    // ){
    //     // $this->myService = $myService;
    // }

    public function index(Person $person = null)
    {
        $msg = 'show people record';
        $result = Person::get();

        return view('hello.index')
            ->with([
                'msg' => $msg,
                'data' => $result,
                'input' => '',
            ]);
    }

    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);

        dispatch(function() use ($person) {
            Storage::append('person_access_log.txt', $person->all_data);
        });
        return redirect()->route('hello');
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
