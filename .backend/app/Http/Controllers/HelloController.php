<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyService;

class HelloController extends Controller
{
    public function index(int $id = -1)
    {
        $myservice = app()->makeWith(MyService::class, ['id' => $id]);

        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->alldata(),
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'msg'=>$request->bye,
        ];
        return view('hello.index', $data);
    }
}
