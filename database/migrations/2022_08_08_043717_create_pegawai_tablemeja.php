<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTablemeja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_tablemeja', function (Blueprint $table) {
            $table->id();//id, primary key, auto increment
        
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('gelar');
            
            $table->timestamps();//created_at,updated_at
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai_tablemeja');
    }
}
