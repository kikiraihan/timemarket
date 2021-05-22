<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nama',50);
            $table->char('singkatan',15)->unique();
            $table->string('deskripsi');
            
            $table->foreignId('id_kepala')->constrained('pegawais')->onDelete('cascade');//FK
            $table->foreignId('id_koordinator')->constrained('pegawais')->onDelete('cascade');//FK

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
