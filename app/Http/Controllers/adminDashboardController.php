<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class adminDashboardController extends Controller
{
    public function index()
    {
        try {
            return view('pages.admin.dashboard');
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan :' . $e->getMessage(), 'error')->autoClose(5000);

            // return redirect()->back();
        }
    }
}
