<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenyakit extends Model
{
    //
    protected $primaryKey = 'id_penyakit';

    protected $fillable=['nama_penyakit','gejala'];

    protected $table = 'data_penyakits';


    public function dataobats() {
    	return $this->hasMany(DataObat::class, 'penyakit_id');
    }

    public function datapasiens() {
    	return $this->hasMany(DataPasien::class, 'penyakit_id');
    } 
    
}
