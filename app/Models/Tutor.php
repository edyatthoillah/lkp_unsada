<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    // Nama tabel (opsional, default 'tutors')
    protected $table = 'tutors';

    // Kolom yang bisa diisi massal (mass assignment)
    protected $fillable = [
        'photo',
        'name',
        'description',
    ];
}
