<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyServiceInterface;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    // public function __construct(
    //     // MyServiceInterface $myService
    // ){
    //     // $this->myService = $myService;
    // }

    public function index()
    {
        $name = DB::table('peoples')->pluck('name')->toArray();
        dd($name);
        $msg = implode('、 ', $name);
        $result = DB::table('peoples')->get();

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
