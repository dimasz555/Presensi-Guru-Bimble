<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Termwind\render;

class profileController extends Controller
{
    public function index(){
        return view('pages.profile');
    }
}
