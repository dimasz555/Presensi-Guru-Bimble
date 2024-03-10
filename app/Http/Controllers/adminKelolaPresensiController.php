<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Laratrust\Models\Role;

class adminKelolaPresensiController extends Controller
{
    public function index()
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Ambil semua user dengan role guru
            $guru = User::whereHasRole('guru')->get();

            return view('pages.admin.kelolaGuruPresensi', [
                'guru' => $guru,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan: ' . $e->getMessage(), 'error')->autoClose(5000);
        }
    }

    public function detail($id)
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        $guru = User::where('id', $id)->firstOrFail();
        $presensi = Attendance::where('user_id', $guru->id)->get();

        return view('pages.admin.kelolaDetailPresensi',[
            'user'=> $guru,
            'guru'=>$guru,
            'presensi'=>$presensi,
        ]);
    }
}
