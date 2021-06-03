<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa extends Model
{
use HasFactory;
protected $fillable = [
'tgl_sewa','id_penyewa','id_tennant','biaya','tgl_awal_sewa','tgl_akhir_sewa'
 ];

}