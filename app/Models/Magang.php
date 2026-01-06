<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;

    protected $table = 'magang';

    protected $fillable = [
        'user_id',
        'division',
        'position',
        'start_date',
        'end_date',
        'cv_path',
        'motivation_letter',
        'status',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}