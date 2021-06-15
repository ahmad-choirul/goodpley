<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komplain extends Model
{
use HasFactory;
protected $table = 'komplain';
        protected $fillable = [
'jenis','rincian_masalah','rincian_balasan','id_outsourcing','id_penyewa','status'
 ];

}
