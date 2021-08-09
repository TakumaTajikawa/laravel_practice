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
        $keys = Person::get()->modelKeys();
        $even = array_filter($keys, function($key){
            return $key % 2 == 0;
        });
        $result = Person::get()->only($even);

        return view('hello.index')
            ->with([
                'msg' => $msg,
                'data' => $result,
            ]);
    }
}
