<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->increments('id_permohonan');
            $table->string('nama_pemohon');
            $table->string('alamat_pemohon');
            $table->string('nomor_hp_pemohon');
            $table->string('nomor_perkara_permohonan')->nullable();
            $table->text('surat_permohonan')->nullable();
            $table->text('surat_kuasa')->nullable();
            $table->text('file_kk')->nullable();
            $table->enum('jenis_layanan',['1','2'])->comment('1 = layanan KK, 2 = layanan kk dan pos');
            $table->string('resi_pos')->nullable();
            $table->string('no_kk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan', function (Blueprint $table) {
            //
        });
    }
}
