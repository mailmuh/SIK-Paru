<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    //
    protected $primaryKey = 'id_pasien';

    protected $fillable = [
    	'nama_pasien', 'ttl', 'umur', 'jk', 'alamat', 'tgl_datang', 'gejala', 'penyakit_id', 'obat_id'
    ]; 

    public function penyakitPasien()
    {
    	return $this->belongsTo(DataPenyakit::class, 'penyakit_id');
    }

    public function obatPasien()
    {
    	return $this->belongsTo(DataObat::class, 'obat_id');
    }
    
}
