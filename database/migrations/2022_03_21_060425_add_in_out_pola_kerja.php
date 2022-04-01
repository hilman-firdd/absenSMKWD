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
        Schema::table('pola_kerja', function (Blueprint $table) {
            $table->string('jam_masuk',5);
            $table->string('jam_pulang',5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pola_kerja', function (Blueprint $table) {
            //
        });
    }
};
