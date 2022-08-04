<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{

    protected $table = "permohonan";
    protected $primaryKey = "id_permohonan";

     protected $fillable = [
        'nama_pemohon', 'alamat_pemohon', 'nomor_hp_pemohon','nomor_perkara_permohonan','surat_permohonan','surat_kuasa','file_kk','jenis_layanan','resi_pos','no_kk'
    ];
}
