<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminroutescontroller extends Controller
{
    //
    public function index(Request $req)
    {
        # code...
        return view('admin.home');
    }
}
