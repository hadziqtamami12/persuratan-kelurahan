<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenNikahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_nikahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('keluarga_id');
            $table->string('pengantar')->nullable();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('kk_calon')->nullable();
            $table->string('foto')->nullable();
            $table->string('foto_calon')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('surat_pernyataan')->nullable();
            $table->string('bukti_pajak')->nullable();
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
        Schema::dropIfExists('dokumen_nikahs');
    }
}
