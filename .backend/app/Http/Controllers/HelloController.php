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

    public function index($id = -1)
    {
        $msg = 'get people records.';
        $first = DB::table('peoples')->first();
        $last = DB::table('peoples')->orderBy('id', 'desc')->first();
        $result = [$first, $last];

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
