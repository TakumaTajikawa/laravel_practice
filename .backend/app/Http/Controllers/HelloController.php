<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyService;

class HelloController extends Controller
{
    public function index(MyService $myService, int $id = -1)
    {

        $myService->setId($id);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->alldata(),
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        dd($request);
        $data = [
            'msg'=>$request->bye,
        ];
        return view('hello.index', $data);
    }
}
