<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifikasiWaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi_wa', function (Blueprint $table) {
            $table->increments('id_notifikasi');
            $table->integer('id_permohonan');
            $table->text('pesan');
            $table->enum('status_kirim',['y','t'])->comment('y = terkirim, t= belum dikirim');
            $table->json('detail_pengiriman')->nullable();
            $table->string('nomor_tujuan');
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
        Schema::dropIfExists('notifikasi_wa', function (Blueprint $table) {
            //
        });
    }
}
