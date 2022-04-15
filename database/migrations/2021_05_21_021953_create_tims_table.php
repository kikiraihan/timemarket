<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tims', function (Blueprint $table) {
            $table->id();
            $table->string('nama',10); //singkat
            $table->longText('deskripsi')->nullable();
            
            $table->string('judul_project',25);
            $table->string('target_pelaksanaan'); //1 minggu tiap bulan. //15 oktober 2021
            $table->enum('jangka',['panjang','pendek']);
            $table->enum('iku',['IKU','Non-IKU'])->nullable();
            
            
            $table->foreignId('id_kepala')->constrained('pegawais')->onDelete('cascade');//FK
            $table->foreignId('id_koordinator')->constrained('pegawais')->onDelete('cascade');//FK
            $table->enum('status',['not start','on going','done']);

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
        Schema::dropIfExists('tims');
    }
}
