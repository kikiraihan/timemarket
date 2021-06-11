<?php

namespace App\Http\Livewire\Crudproker;

use App\Models\Pegawai;
use App\Models\Tim;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Forminput extends Component
{

    public $metode;
    public $idToUpdate;

    

    public 
    $nama,
    $deskripsi,
    $judul_project,
    $target_pelaksanaan,
    $jangka,
    $iku,
    $id_kepala,
    $status;

    public $search, $selectedKep;

    
    public function mount($idToUpdate=null)
    {
        // kalau dia create
        if($idToUpdate==NULL)
        {
            $this->inputTambah();
            // $this->id_kepala=null;
        }
        //kalau dia update
        else
        {
            $this->inputUpdate($idToUpdate);
        }
    }



    public function render()
    {
        $selectkepala=null;
        $isTampilSearch=true;
        if($this->id_kepala==null)
        {
            if($this->search!=null)
            {
                $selectkepala=$this->cariPegawai()->get()->load('user');
            }
        }
        return view('livewire.crudproker.forminput',compact(['selectkepala','isTampilSearch']));
    }


    public function cariPegawai()
    {
        $pegawai=Pegawai::with('user')->where(function(Builder $query){
            return $query
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orWhere('nip', 'like', '%'.$this->search.'%');
        })
        ;
        return $pegawai;
    }

    public function pilihKepala($id)
    {
        $this->id_kepala=$id;
        $this->selectedKep=Pegawai::find($id);
    }

    public function batalkanKepala()
    {
        $this->id_kepala=null;
        $this->selectedKep=null;
    }


















    // UNTUK GANTI METODE CREATE ATAU UPDATE
    protected function inputTambah()
    {
        $this->metode="newProker";
    }

    protected function inputUpdate($id)
    {
        //$this->reset();
        $proker=Tim::find($id);


        $this->idToUpdate           =$id;

        $this->nama                 = $proker->nama;
        $this->deskripsi            = $proker->deskripsi;
        $this->judul_project        = $proker->judul_project;
        $this->target_pelaksanaan   = $proker->target_pelaksanaan;
        $this->jangka               = $proker->jangka;
        $this->iku                  = $proker->iku;
        $this->id_kepala            = $proker->id_kepala;
        $this->status               = $proker->status;

        
        $this->selectedPeg=Pegawai::find($proker->id_kepala);

        $this->metode="updateProker";      
        
    }

    


}
