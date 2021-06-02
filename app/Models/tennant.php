<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tennant extends Model
{
use HasFactory;
protected $fillable = [
'nama_tennant','id_lantai','id_kategori','lebar','panjang','gambar'
 ];

}
