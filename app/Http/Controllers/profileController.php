<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class profileController extends Controller
{
    public function index()
    {
        return view('pages.profile');
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

    public function updateAvatar(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Menyatakan bahwa avatar harus berupa gambar (jpeg, png, jpg, gif) dengan ukuran maksimal 2MB
            ]);

            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Menghapus avatar lama jika ada
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            // Mengambil file avatar dari request
            $avatar = $request->file('avatar');

            // Menyimpan avatar baru ke storage
            $avatarPath = 'avatars/' . $avatar->getClientOriginalName();
            Storage::putFileAs('public', $avatar, $avatarPath);

            User::findOrFail($user->id)->update([
                'avatar' => $avatarPath
            ]);

            // Redirect dengan pesan sukses
            Alert::toast('Foto Profil berhasil diubah.', 'success')->autoClose(5000);

            return redirect()->back();
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan saat mengunggah avatar : ' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }
}
