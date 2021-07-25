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
        if ($id >= 0) {
            $msg = 'get ID <=' . $id;
            $result = DB::table('peoples')->where('id', '<=', $id)->get();
        } else {
            $msg = 'get peoples records.';
            $result = DB::table('peoples')->get();
        }
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
