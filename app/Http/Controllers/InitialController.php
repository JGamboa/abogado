<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitialController extends Controller
{

    /**
     * Show the application welcome.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
}


