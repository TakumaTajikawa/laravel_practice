<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyServiceInterface;
// use App\Facades\MyService;

class HelloController extends Controller
{
    // public function __construct(
    //     // MyServiceInterface $myService
    // ){
    //     // $this->myService = $myService;
    // }

    public function index(Request $request)
    {
        dd($request);
        $data = [
            'msg' => $request->msg,
            'data' => $request->allData,
        ];
        return view('hello.index', $data);
    }
}
