<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyServiceInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class HelloController extends Controller
{
    // public function __construct(
    //     // MyServiceInterface $myService
    // ){
    //     // $this->myService = $myService;
    // }

    public function index(Request $request)
    {
        $msg = 'show people record';
        $re = Person::get();
        $fields = Person::get()->fields();

        return view('hello.index')
            ->with([
                'msg' => implode(', ', $fields),
                'data' => $re
            ]);
    }
}
