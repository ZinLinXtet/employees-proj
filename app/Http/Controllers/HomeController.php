<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        dd(auth()->employee()->role);
        return view('home.index');
    }
}
