<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagecontroller extends Controller
{
    public function index()
    {
       return view ('pages.index');
    }
    public function page1()
    {
        return view ('layouts.app');
    }
}
