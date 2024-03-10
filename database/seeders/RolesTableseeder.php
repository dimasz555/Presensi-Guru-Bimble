<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // role admin
        DB::table('roles')->updateOrInsert([
            'name' => 'admin',
        ]);   
        
         // Membuat role guru
         DB::table('roles')->updateOrInsert([
            'name' => 'guru',
        ]);
    }
}
