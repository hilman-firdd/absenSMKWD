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
        Schema::create('komponen_gaji', function (Blueprint $table) {
            // $table->id();
            $table->string('kode_komponen', 4)->primary();
            $table->string('nama_komponen', 40);
            $table->enum('jenis', ['tunjangan','potongan']);
            $table->integer('nilai');
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
        Schema::dropIfExists('komponen_gaji');
    }
};
