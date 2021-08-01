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

    public function index($id)
    {
        $ids = explode(',', $id);
        dd($ids);
        $msg = 'get people.';
        $result = DB::table('peoples')->whereBetween('id', $ids)->get();


        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
