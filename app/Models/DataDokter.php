<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDokter extends Model
{
    //
    protected $primaryKey = 'id_dokter';

    protected $fillable = [
    	'nama_dokter', 'ttl', 'alamat', 'agama', 'spesialisasi'
    ];
    
}
