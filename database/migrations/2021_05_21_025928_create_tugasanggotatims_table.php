<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasanggotatimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasanggotatims', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_anggotatim')->constrained('anggotatims')->onDelete('cascade')->nullable();//FK
            
            $table->foreignId('id_tim')->constrained('tims')->onDelete('cascade');//FK
            $table->foreignId('id_pegawai')->constrained('pegawais')->onDelete('cascade');//FK
            // $table->primary(['id_tim','id_pegawai']);//tidak boleh karena harus duplikasi dua kolom ini

            $table->string('judul',80);
            $table->timestamp('startdate')->nullable();
            $table->timestamp('duedate')->nullable();
            $table->enum('status',['not start','on going','done']);
            
            $table->longText('catatan')->nullable();
            $table->enum('level',[1,2,3]);//'ringan','sedang','berat'

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
        Schema::dropIfExists('tugasanggotatims');
    }
}
