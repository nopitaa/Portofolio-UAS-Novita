<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formulir extends Model
{
    protected $fillable =[
        'nama', 'email', 'no_hp', 'id_motor','nama_motor','no_ktp', 'tanggal_sewa', 'lokasi_pengantaran', 'lokasi_pengembalian'
    ];
}
