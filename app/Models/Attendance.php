<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // protected $table = 'presensi';
    protected $fillable = [
        'user_id',
        'attendance_at',
        'created_at',
        'updated_at',
        'status',
        'location',
    ];
}
