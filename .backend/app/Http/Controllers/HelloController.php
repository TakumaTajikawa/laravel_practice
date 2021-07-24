<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyServiceInterface;

class HelloController extends Controller
{
    public function __construct(
        // MyServiceInterface $myService
    ){
        // $this->myService = $myService;
    }

    public function index(MyServiceInterface $myService, int $id = -1)
    {

        $myService->setId(2);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->allData(),
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
