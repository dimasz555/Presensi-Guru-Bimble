<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Laratrust\Models\Role;

class AttachRolesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil role "guru" dari database
        $guruRole = Role::where('name', 'guru')->first();

        // Pastikan role "guru" ada
        if (!$guruRole) {
            $this->command->error('Role "guru" not found.');
            return;
        }

        // Ambil semua user
        $users = User::all();

        // Looping untuk menambahkan role "guru" pada setiap user
        foreach ($users as $user) {
            // Attach role "guru" pada user
            $user->addRole($guruRole);
        }

        $this->command->info('Role "guru" attached to all users successfully.');
    }
}
