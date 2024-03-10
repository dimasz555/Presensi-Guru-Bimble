<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laratrust\Models\Role;
use Laratrust\LaratrustUser;

class adminKelolaGuruController extends Controller
{
    public function index()
    {

        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Ambil semua user dengan role guru
            $guru = User::whereHasRole('guru')->get();

            return view('pages.admin.kelolaGuru', [
                'guru' => $guru,
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan: ' . $e->getMessage(), 'error')->autoClose(5000);
        }
    }

    public function store(Request $request)
    {
        try {
            // Validasi data input jika diperlukan
            $request->validate([
                'name' => 'required',
                'username' => ['required', 'string', 'min:5', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'string', 'min:8'],
                'phone' => 'required',
                'last_education' => 'required',
                'jurusan' => 'required',
            ]);

            // Membuat entri guru baru
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'phone' => $request->phone,
                'last_education' => $request->last_education,
                'jurusan' => $request->jurusan,
                // Tambahkan atribut lainnya sesuai kebutuhan Anda
            ]);

            $guruRole = Role::where('name', 'guru')->first();
            $user->addRole($guruRole);


            // Menampilkan toast berhasi
            Alert::toast('Data guru berhasil ditambahkan.', 'success')->autoClose(5000);
            return redirect()->back();
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan: ' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'last_education' => 'required',
            'jurusan' => 'required',
        ]);

        try {
            // Temukan guru berdasarkan ID
            $guru = User::where('id', $request->id)->firstOrFail();

            // Update data guru
            $guru->update([
                'name' => $request->name,
                'username' => $request->username,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'last_education' => $request->last_education,
                'jurusan' => $request->jurusan,
            ]);

            // dd($guru);

            // Redirect atau kembalikan respons sesuai kebutuhan Anda
            Alert::toast('Data guru berhasil diupdate.', 'success')->autoClose(5000);
            return redirect()->back();
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan: ' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            $guru = User::where('id', $request->id)->firstOrFail();

            $guru->delete($guru);

            Alert::toast('Data guru berhasil dihapus.', 'success')->autoClose(5000);

            return redirect()->back();
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi pengecualian
            Alert::toast('Terjadi kesalahan: ' . $e->getMessage(), 'error')->autoClose(5000);

            return redirect()->back();
        }
    }
}
