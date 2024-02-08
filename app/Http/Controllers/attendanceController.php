<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;


class attendanceController extends Controller
{
    public function index()
    {

        $attendance = Attendance::all();

        return view('pages.presensi', [
            'attendance' => $attendance,
        ]);
    }
}
