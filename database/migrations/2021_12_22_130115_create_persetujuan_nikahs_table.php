<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersetujuanNikahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persetujuan_nikahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasangan_id');
            $table->unsignedBigInteger('keluarga_id');
            $table->enum('status', ['belum', 'sudah']);
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
        Schema::dropIfExists('persetujuan_nikahs');
    }
}
