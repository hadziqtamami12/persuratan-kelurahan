<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanNikahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_nikahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasangan_id');
            $table->unsignedBigInteger('keluarga_id');
            $table->date('tanggal');
            $table->string('lokasi');
            $table->softDeletes();
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
        Schema::dropIfExists('permohonan_nikahs');
    }
}
