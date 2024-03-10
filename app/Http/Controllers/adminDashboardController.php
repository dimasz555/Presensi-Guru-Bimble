<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class adminDashboardController extends Controller
{
    public function index()
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Menghitung jumlah total pengguna
            $totalUsers = User::count();

            // Menghitung jumlah pengguna dengan peran (role) guru
            $totalAdmin = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->count();

            // Menghitung jumlah pengguna dengan peran (role) guru
            $totalGuru = User::whereHas('roles', function ($query) {
                $query->where('name', 'guru');
            })->count();

            // Mengambil aktivitas terbaru guru dalam menambahkan presensi
            $recentActivities = Attendance::whereHas('user.roles', function ($query) {
                $query->where('name', 'guru');
            })->latest()->take(5)->get();

            return view('pages.admin.dashboard', [
                'totalUsers' => $totalUsers,
                'totalGuru' => $totalGuru,
                'totalAdmin' => $totalAdmin,
                'recentActivities' => $recentActivities,
            ]);
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan :' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }
}
