<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDagangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dagangans', function (Blueprint $table) {
            $table->id();
            $table->string('suplier')->nullable();
            $table->string('nama_barang')->nullable();
            $table->integer('qunatity')->nullable();
            $table->string('agen')->nullable();
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
        Schema::dropIfExists('dagangans');
    }
}
