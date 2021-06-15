<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tagihans extends Model
{
use HasFactory;
protected $table = 'tagihans';
protected $fillable = [
'id_sewa','jenis_tagihan','tgl_tagihan','deskripsi','nominal','bukti_tagihan','bukti_pembayaran','tgl_pembayaran','id_users', 'status'
 ];

}
