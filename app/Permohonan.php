<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{

    protected $table = "permohonan";

     protected $fillable = [
        'nama_pemohon', 'alamat_pemohon', 'nomor_hp_pemohon','nomor_perkara_pemohon','surat_permohonan','surat_kuasa','file_kk','jenis_layanan','resi_pos','no_kk'
    ];
}
