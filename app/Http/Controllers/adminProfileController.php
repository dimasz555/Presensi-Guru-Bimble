<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class adminProfileController extends Controller
{
    public function index()
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();

            return view('pages.admin.profile');
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan :' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'old_password' => ['required', 'string', 'min:8'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ], [
                'password.confirmed' => 'Konfirmasi password tidak cocok dengan password baru.',
            ]);

            $currentPasswordStatus = Hash::check($request->old_password, auth()->user()->password);
            if ($currentPasswordStatus) {

                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);

                Alert::toast('Password berhasil diubah.', 'success')->autoClose(5000);

                return redirect()->back();
            } else {
                return redirect()->back()->withErrors(['old_password' => 'Password lama yang dimasukkan salah.']);
            }
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan : ' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }
}
