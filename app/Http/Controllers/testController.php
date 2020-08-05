<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function index()
    {

        return view('home');
    }

    public function datatables()
    {
        return view('view');
    }
}
