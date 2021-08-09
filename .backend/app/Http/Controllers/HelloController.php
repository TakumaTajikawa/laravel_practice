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
        $even = Person::get()->filter(function($item){
            return $item->id % 2 == 0;
        });
        $map = $even->map(function($item, $key){
            return $item->id . ':' . $item->name;
        });


        return view('hello.index')
            ->with([
                'msg' => $map,
                'data' => $even,
            ]);
    }
}
