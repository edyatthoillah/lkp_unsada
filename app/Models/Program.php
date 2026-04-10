<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'color',
    ];

    /**
     * Default color kalau null
     */
    public function getColorAttribute($value)
    {
        return $value ?? '#000000';
    }

    public function details()
    {
        return $this->hasMany(DetailProgram::class);
    }
}