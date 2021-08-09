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
        $result = Person::get()->reject(function($person){
            return $person->age < 40;
        });

        return view('hello.index')
            ->with([
                'msg' => $msg,
                'data' => $result,
            ]);
    }
}
