<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'instagram',
        'alamat',
        'foto'
    ];

    protected $hidden = [];
}