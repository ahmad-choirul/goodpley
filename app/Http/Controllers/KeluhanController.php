<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function __construct()
    {
        $this->middleware('keluhan');
    }
    public function index()
    {
        return view('keluhan');
    }
}
