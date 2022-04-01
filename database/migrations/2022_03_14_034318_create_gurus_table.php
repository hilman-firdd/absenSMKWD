<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            // $table->id();
            $table->string('nik',10)->primary();
            $table->string('nama',40);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->date('tanggal_masuk');
            $table->string('kode_status_kawin',3);
            $table->string('jenis_kelamin',1);
            $table->text('foto');
	        $table->string('kode_departemen',8);
            $table->string('kode_jabatan',5);
            $table->integer('gaji_pokok')->nullable()->unsigned();
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
        Schema::dropIfExists('guru');
    }
};
