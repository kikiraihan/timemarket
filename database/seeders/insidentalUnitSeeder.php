<?php

namespace Database\Seeders;

use App\Models\Tim;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class insidentalUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // nnti lanjut, ini seeder untuk membuat insidental proker ke masing2 dua kepala tim

        $unitall=Unit::with('anggotaunits')->where('id_koordinator','=','3')->get();

        $tim = new Tim();
        $tim->nama                  = "INFO";//kodeproker
        $tim->deskripsi             = "ini deskripsi";
        $tim->jangka                = "panjang";
        $tim->id_kepala             = 3;
        $tim->judul_project         = "Konten Infografis";
        $tim->target_pelaksanaan    = "22 Januari 2021";
        $tim->iku                   = "Non-IKU";
        $tim->status                = "on going";
        $tim->save();

    }
}
