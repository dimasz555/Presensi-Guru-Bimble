<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddAccountAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Membuat akun admin baru
         $admin = new User();
         $admin->name = 'Riduwan';
         $admin->username = 'admin12345';
         $admin->password = Hash::make('admin12345');
         $admin->save();
 
         $admin->addRole('admin');
    }
}
