<?php

namespace App\Http\Livewire\Crudtask;

use App\Models\Pegawai;
use App\Models\Tim;
use App\Models\tugasanggotatim;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ForminputPegawai extends Component
{
    public $metode;
    public $idToUpdate;


    public 
    $id_proker,
    $id_pegawai,
    $judul,
    $level,
    $startdate,
    $duedate,
    $catatan
    ;

    public $search,$selectedPeg;


    protected $CustomMessages = [
        'integer' => 'Kolom :attribute, harus berupa angka',
        'string' => 'Kolom :attribute, harus berupa teks',
        'date' => 'Kolom :attribute, harus berupa tanggal',
        'required'=>'Kolom tidak boleh kosong',
        'unique'=>'Data kolom :attribute sudah ada sebelumnya',
    ];

    public function mount($idproker=null, $idToUpdate=null)
    {
        
        // kalau dia create
        if($idToUpdate==NULL)
        {
            $this->id_proker=$idproker;
            $this->inputTambah();
        }
        //kalau dia update
        else
        {
            $this->inputUpdate($idToUpdate);
        }

        $this->id_pegawai=auth()->user()->pegawai->id;
    }

    public function render()
    {
        return view('livewire.crudtask.forminput-pegawai');
    }



    // UNTUK GANTI METODE CREATE ATAU UPDATE
    protected function inputTambah()//prepare
    {
        //$this->reset();
        $this->metode="newTask";
    }

    protected function inputUpdate($id)//prepare
    {
        //$this->reset();
        $tugas=tugasanggotatim::find($id);
        $this->idToUpdate           =$id;

        $this->id_proker    = $tugas->id_tim;
        $this->id_pegawai   = $tugas->id_pegawai;
        $this->judul        = $tugas->judul;
        $this->level        = $tugas->level;
        $this->startdate    = $tugas->startdate->format('Y-m-d');
        $this->duedate      = $tugas->duedate->format('Y-m-d');
        $this->catatan       = $tugas->catatan;

        $this->selectedPeg=Pegawai::find($tugas->id_pegawai);

        $this->metode="updateTask";        
    }


    // FORM TO DATABASE FUNCTION
    public function newTask()
    {
        
        $ini=$this->validate( [
            'judul'         =>"required|string",
            'level'         =>"required|integer",
            'startdate'     =>"required|date",
            'duedate'       =>"required|date",
            'id_proker'     =>"required|integer",
            'id_pegawai'    =>"required|integer",
            'catatan'       =>"nullable|string",
            // 'id_ormawa'         =>"required|unique:anggota_ormawa,id_ormawa,NULL,id,id_mahasiswa,". $mahasiswa->id,
        ],$this->CustomMessages);

        // dd("ini");

        $tugas=new tugasanggotatim;
        $tugas->id_tim          =$this->id_proker;
        $tugas->id_pegawai      =$this->id_pegawai;
        $tugas->judul           =$this->judul;
        $tugas->startdate       =$this->startdate;
        $tugas->duedate         =$this->duedate;
        $tugas->catatan         =$this->catatan;
        $tugas->level           =$this->level;
        $tugas->status          ="on going";
        $tugas->save();

        $this->reset();
        
        $this->emit('swalAdded');
        $this->inputTambah();

        // return redirect()->back();
    }

    public function updateTask()
    {

        $idToUpdate=$this->idToUpdate;
        $tugas=tugasanggotatim::find($idToUpdate);

        //$tugas->id_tim      =$this->id_proker;
        $tugas->id_pegawai  =$this->id_pegawai;
        $tugas->judul       =$this->judul;
        $tugas->startdate   =$this->startdate;
        $tugas->duedate     =$this->duedate;
        $tugas->catatan     =$this->catatan;
        $tugas->level       =$this->level;
        $tugas->save();


        //$this->reset();
        //$this->inputUpdate($idToUpdate);
        $this->emit('swalUpdated');
        return redirect()->route('Katimboard.showteam',['id'=>$tugas->id_tim]);
    }



}
