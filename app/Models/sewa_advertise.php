<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa_advertise extends Model
{
use HasFactory;
protected $table = 'sewa_advertise';
protected $fillable = [
'id_sewa','id_advertise','tgl_mulai_sewa','lama_sewa','id_users'
 ];

}
