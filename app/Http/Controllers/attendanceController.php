<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


class attendanceController extends Controller
{
    public function index()
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Mendapatkan riwayat presensi pengguna yang diurutkan berdasarkan tanggal pembuatan terbaru
            $attendance = $user->attendanceHistory->sortByDesc('created_at');

            // Mengirimkan data presensi ke view
            return view('pages.presensi', compact('attendance'));
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan :' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }


    public function store(Request $request)
    {
        try {
            // Validasi data input jika diperlukan
            $request->validate([
                'attendance_at' => 'required|date_format:Y-m-d\TH:i',
                'status' => 'required',
                'location' => 'required',
            ]);

            // Mendapatkan ID user yang saat ini login
            $userId = Auth::id();

            // Membuat entri presensi baru
            $attendance = Attendance::create([
                'user_id' => $userId,
                'attendance_at' => $request->attendance_at,
                'status' => $request->status,
                'location' => $request->location,
                'detail' => $request->detail,
            ]);

            // Menampilkan SweetAlert2 Toast setelah operasi berhasil dilakukan
            Alert::toast('Presensi berhasil disimpan.', 'success')->autoClose(5000);

            // Redirect atau kembalikan respons sesuai kebutuhan Anda
            return redirect()->back();
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan :' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }
}
