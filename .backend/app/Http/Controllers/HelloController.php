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
        $id = $request->query('page');
        $msg = 'show page: ' . $id;
        $result = DB::table('peoples')->paginate(3);

        return view('hello.index')
            ->with([
                'msg' => $msg,
                'data' => $result,
            ]);
    }
}
