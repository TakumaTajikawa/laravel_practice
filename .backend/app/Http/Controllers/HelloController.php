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
        $data = ['msg' => '', 'data' => []];
        $msg = 'get: ';
        $result = [];
        DB::table('peoples')->chunkById(2, function($items) use (&$msg, &$result){
            foreach($items as $item) {
                $msg .= $item->id . ' ';
                $result += array_merge($result, [$item]);
                break;
            }
            return true;
        });

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
