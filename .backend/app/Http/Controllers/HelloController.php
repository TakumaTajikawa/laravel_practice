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

    public function index(Request $request)
    {
        $result = DB::table('peoples')->get();
        $data = [
            'msg' => 'Database access.',
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
