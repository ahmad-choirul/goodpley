<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertise extends Model
{
use HasFactory;
protected $table = 'advertise';
protected $fillable = [
'nama_advertise','panjang','lebar','id_lantai','jenis','harga','gambar'
 ];

}
