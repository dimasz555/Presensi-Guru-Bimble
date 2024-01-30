<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('temp_email')->after('email'); // Menambahkan kolom 'temp_email'
        });

        DB::table('users')->update(['temp_email' => DB::raw('email')]); // Mengisi kolom 'temp_email' dengan data dari kolom 'email'

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email'); // Menghapus kolom 'email' setelah data disalin ke 'temp_email'
            $table->string('username')->after('temp_email'); // Menambahkan kolom 'username'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'temp_email')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('temp_email');
            });
        }
    }
};
