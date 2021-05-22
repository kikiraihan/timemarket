<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasanggotaunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasanggotaunits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_anggotaunit')->constrained('anggotaunits')->onDelete('cascade');//FK
            $table->string('judul',80);
            $table->longText('deskripsi');

            $table->enum('jenis',['pokok','tambahan']);
            $table->timestamp('startdate')->nullable();//kalau pokok nullable;
            $table->timestamp('duedate')->nullable();//kalau pokok nullable;
            $table->enum('status',['on going','done'])->nullable();//kalau pokok nullable


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
        Schema::dropIfExists('tugasanggotaunits');
    }
}
