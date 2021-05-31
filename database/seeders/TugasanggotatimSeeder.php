<?php

namespace Database\Seeders;

use App\Models\tugasanggotatim;
use Illuminate\Database\Seeder;

class TugasanggotatimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BBM
        $task=new tugasanggotatim;
        $task->id_tim=1;
        $task->id_pegawai=7;
        $task->judul = "Nanya boleh atau engga BBM ke Dkom";
        $task->startdate = "2021-1-17";
        $task->duedate = "2021-1-18";
        $task->status = "done";
        $task->catatan = "Menunggu info dr Kemenko";
        $task->level = 1;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=1;
        $task->id_pegawai=7;
        $task->judul = "Set Materi Re-Echoing RDG Jan 2021";
        $task->startdate = "2021-1-20";
        $task->duedate = "2021-1-22";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 1;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=1;
        $task->id_pegawai=7;
        $task->judul = "M.02 All BBM";
        $task->startdate = "2021-1-20";
        $task->duedate = "2021-1-22";
        $task->status = "on going";
        $task->catatan = "GoPost, RG, Hulondhalo.id, ";
        $task->level = 1;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=1;
        $task->id_pegawai=8;
        $task->judul = "Set Lokasi BBM dan Perlengkapan";
        $task->startdate = "2021-1-20";
        $task->duedate = "2021-1-27";
        $task->status = "on going";
        $task->catatan = "GoPost, RG, Hulondhalo.id,";
        $task->level = 3;
        $task->save();




        // -- PSBI-B
        $task=new tugasanggotatim;
        $task->id_tim=2;
        $task->id_pegawai=19;
        $task->judul = "Updating Data Penerima Beasiswa";
        $task->startdate = "2021-9-10";
        $task->duedate = "2021-9-20";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 3;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=2;
        $task->id_pegawai=19;
        $task->judul = "Jumlah Kebutuhan Penerima Beasiswa";
        $task->startdate = "2021-9-13";
        $task->duedate = "2021-9-23";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 3;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=2;
        $task->id_pegawai=8;
        $task->judul = "M.02 Wawancara dan Group Discussion Beasiswa";
        $task->startdate = "2021-9-23";
        $task->duedate = "2021-9-24";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 1;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=2;
        $task->id_pegawai=19;
        $task->judul = "Surat ke Universitas Beasiswa BI ";
        $task->startdate = "2021-9-23";
        $task->duedate = "2021-9-24";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 1;
        $task->save();


        $task=new tugasanggotatim;
        $task->id_tim=2;
        $task->id_pegawai=8;
        $task->judul = "M.02 Wawancara dan Group Discussion Beasiswa";
        $task->startdate = "2021-9-28";
        $task->duedate = "2021-9-29";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 1;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=2;
        $task->id_pegawai=19;
        $task->judul = "M.02 Usulan Penerima Beasiswa";
        $task->startdate = "2021-10-10";
        $task->duedate = "2021-10-11";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 1;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=2;
        $task->id_pegawai=19;
        $task->judul = "Pembayaran Beasiswa Semester 1";
        $task->startdate = "2021-10-10";
        $task->duedate = "2021-10-15";
        $task->status = "on going";
        $task->catatan = null;
        $task->level = 3;
        $task->save();


        // -- Konten Infografis
        $task=new tugasanggotatim;
        $task->id_tim=3;
        $task->id_pegawai=7;
        $task->judul = "Nanya informal Vendor";
        $task->startdate = "2021-1-12";
        $task->duedate = "2021-1-12";
        $task->status = "Done";
        $task->catatan = null;
        $task->level = 1;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=3;
        $task->id_pegawai=8;
        $task->judul = "M.02 Prinsip Infografis tahun 2021";
        $task->startdate = "2021-1-10";
        $task->duedate = "2021-1-15";
        $task->status = "on going";
        $task->catatan = "ganti konsep";
        $task->level = 3;
        $task->save();

        $task=new tugasanggotatim;
        $task->id_tim=3;
        $task->id_pegawai=8;
        $task->judul = "SPK Infografis ";
        $task->startdate = "2021-1-22";
        $task->duedate = "2021-1-22";
        $task->status = "on going";
        $task->catatan = "ganti konsep";
        $task->level = 3;
        $task->save();

        

        
        
        
    }
}
