<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProgram extends Model
{
    use HasFactory;

    protected $table = 'detail_programs';

    protected $fillable = [
        'program_id',
        'sub_program',
        'detail',
        'harga',
    ];

    /**
     * Relasi ke Program
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
