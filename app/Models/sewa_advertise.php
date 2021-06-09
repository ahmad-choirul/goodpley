<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa_advertise extends Model
{
use HasFactory;
protected $table = 'sewa_advertise';
protected $fillable = [
'nama_sewa_advertise','panjang','lebar','id_lantai','jenis','harga','gambar'
 ];

}
