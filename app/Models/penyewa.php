<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyewa extends Model
{
use HasFactory;
protected $table = 'penyewas';

protected $fillable = [
'nama_pemilik','alamat_pemilik','hp','email','ktp','nama_usaha','alamat_usaha','no_siup','id_users'
 ];

}
