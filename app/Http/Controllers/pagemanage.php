<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagemanage extends Controller
{
    //
    public function index()
    {
        # code...
        return view('home');
    }

    public function about()
    {
        # code...
        return view('aboutus');
    }
}
