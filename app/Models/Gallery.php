<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galeries'; // sesuaikan dengan nama tabel

    protected $fillable = [
        'image',
    ];
}