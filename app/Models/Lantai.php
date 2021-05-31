<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    use HasFactory;
protected $table = 'lantai';
        protected $fillable = [
        'nama_lantai'
    ];
}
