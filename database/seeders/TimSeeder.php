<?php

namespace Database\Seeders;

use App\Models\Tim;
use Illuminate\Database\Seeder;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //1
        $tim = new Tim;
        $tim->nama = "BBM";//kodeproker
        $tim->deskripsi = "ini deskripsi";
        $tim->jangka = "pendek";
        $tim->id_kepala = 3;
        $tim->judul_project = "Bahan Bakar minyak";
        $tim->target_pelaksanaan = "Minggu 1 setiap bulan";
        $tim->iku = "IKU";
        $tim->status = "on going";
        $tim->save();

        // 2
        $tim = new Tim;
        $tim->nama                  = "PSBI-B";//kodeproker
        $tim->deskripsi             = "ini deskripsi";
        $tim->jangka                = "panjang";
        $tim->id_kepala             = 3;
        $tim->judul_project         = "Beasiswa Semester II";
        $tim->target_pelaksanaan    = "15 Oktober 2021";
        $tim->iku    = "IKU";
        $tim->status                = "on going";
        $tim->save();

        // 3
        $tim = new Tim;
        $tim->nama                  = "INFO";//kodeproker
        $tim->deskripsi             = "ini deskripsi";
        $tim->jangka                = "panjang";
        $tim->id_kepala             = 3;
        $tim->judul_project         = "Konten Infografis";
        $tim->target_pelaksanaan    = "22 Januari 2021";
        $tim->iku                   = "Non-IKU";
        $tim->status                = "on going";
        $tim->save();


        // 
        $tim = new Tim;
        $tim->nama               = "#ISD";//kodeproker
        $tim->judul_project      = "Kegiatan insidental";
        $tim->deskripsi          = "Kegiatan non proker, kegiatan yang tidak direncanakan, seperti undangan dsb.";
        $tim->id_kepala          = 3;
        $tim->jangka             = "pendek";
        $tim->target_pelaksanaan = "anytime";
        $tim->iku                = "Non-IKU";
        $tim->status             = "on going";
        $tim->save();

        // $this->command->info('Berhasil Menambahkan Tim');

    }
}
