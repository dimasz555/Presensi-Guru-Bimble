<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function index() {
        return view('pages.presensi');
    }
}