<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    //

    protected $table = 'penggajians';
    protected $fillable = ['Kode_tunjangan_pegawai', 'Status_pengambilan', 'Petugas_penerima'];
    protected $visible = ['Kode_tunjangan_pegawai', 'Status_pengambilan', 'Petugas_penerima'];
    public $timestamps = true;

    public function Tunjangan_pegawai(){
    	return $this->belongsTo('App\Tunjangan_pegawai', 'Kode_tunjangan_pegawai');
    }
}
