<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_murids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nikc_name');
            $table->string('full_name');
            $table->string('jenis_kelamin', 10);
            $table->string('no_telp', 15);
            $table->string('alamat', 15);
            $table->date('tanggal_lahir');
            $table->string('foto_profil');
            $table->string('status', 11);
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('data_kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_murids');
    }
}
