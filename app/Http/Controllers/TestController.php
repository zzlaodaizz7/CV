<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        dd(Artisan::call('migrate:fresh'));
        return view('admin.test');
    }
}
