<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotatimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotatims', function (Blueprint $table) {
            // $table->id();
            
            $table->foreignId('id_tim')->constrained('tims')->onDelete('cascade');//FK
            $table->foreignId('id_pegawai')->constrained('pegawais')->onDelete('cascade');//FK
            $table->primary(['id_tim','id_pegawai']);
            
            // $table->string('role')->nullable();//FK//bleh hapus kayaknya
            
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
        Schema::dropIfExists('anggotatims');
    }
}
