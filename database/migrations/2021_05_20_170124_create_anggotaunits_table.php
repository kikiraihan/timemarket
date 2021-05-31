<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotaunits', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('id_pegawai')->constrained('pegawais')->onDelete('cascade');//FK
            $table->foreignId('id_unit')->constrained('units')->onDelete('cascade');//FK
            $table->string('role');//FK
            // $table->primary(['id_unit','id_pegawai']);


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
        Schema::dropIfExists('anggotaunits');
    }
}
