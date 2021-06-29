<?php

namespace App\Http\Livewire\Crudproker;

use App\Models\Pegawai;
use App\Models\Tim;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
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

    protected $CustomMessages = [
        'integer' => 'Kolom :attribute, harus berupa angka',
        'string' => 'Kolom :attribute, harus berupa teks',
        'date' => 'Kolom :attribute, harus berupa tanggal',
        'required'=>'Kolom tidak boleh kosong',
        'unique'=>'Data kolom :attribute sudah ada sebelumnya',
    ];

    
    public function mount($idToUpdate=null)
    {
        // kalau dia create
        if($idToUpdate==NULL)
        {
            $this->inputTambah();
            //$this->id_kepala=null;
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
        // $isTampilSearch=true;
        if($this->id_kepala==null)
        {
            if($this->search!=null)
            {
                $selectkepala=$this->cariPegawai()->get();
            }
        }
        return view('livewire.crudproker.forminput',compact(['selectkepala']));//,'isTampilSearch'
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

        
        $this->selectedKep=Pegawai::find($proker->id_kepala);

        $this->metode="updateProker";      
        
    }


    public function newProker()
    {
        $this->validate( [
            'jangka'             =>"required|string",
            'iku'                =>"required|string",
            'nama'               =>"required|string",
            'judul_project'      =>"required|string",
            'target_pelaksanaan' =>"required|string",
            'deskripsi'          =>"nullable|string",
        ],$this->CustomMessages);

        $proker=new Tim;
        $proker->jangka              =$this->jangka;
        $proker->iku                 =$this->iku;
        $proker->nama                =$this->nama;
        $proker->judul_project       =$this->judul_project;
        $proker->target_pelaksanaan  =$this->target_pelaksanaan;
        $proker->deskripsi           =$this->deskripsi;
        $proker->id_kepala           =$this->id_kepala;
        $proker->id_koordinator      =Auth::user()->pegawai->id;//katim id
        $proker->save();

        // tambahkan kepala sebagai anggota
        $proker->anggotatims()->attach($this->id_kepala);

        $this->reset();
        $this->emit('swalAdded');
        $this->inputTambah();
    }


    public function updateProker()
    {
        // dd('cek');

        $this->validate( [
            'jangka'             =>"required|string",
            'iku'                =>"required|string",
            'nama'               =>"required|string",
            'judul_project'      =>"required|string",
            'target_pelaksanaan' =>"required|string",
            'deskripsi'          =>"nullable|string",
        ],$this->CustomMessages);

        
        $idToUpdate=$this->idToUpdate;
        $proker=Tim::find($idToUpdate);

        //kalau kepala tim berubah
        if($proker->id_kepala!=$this->id_kepala)
        {
            if(Auth::user()->hasRole('Pegawai'))
            $redirect='mytask.myteam';
            elseif(Auth::user()->hasRole('Admin'))
            $redirect='proker.crud';
            else
            $redirect='Katimboard.myteam';
        }
        // kalau tidak berubah tapi admin
        elseif(Auth::user()->hasRole('Admin'))
            $redirect='proker.crud';
        // kalau tidak berubah balik ke showteam admin
        else
        {
            $redirect='Katimboard.showteam';
        }


        $proker->jangka              =$this->jangka;
        $proker->iku                 =$this->iku;
        $proker->nama                =$this->nama;
        $proker->judul_project       =$this->judul_project;
        $proker->target_pelaksanaan  =$this->target_pelaksanaan;
        $proker->deskripsi           =$this->deskripsi;
        if($this->id_kepala!=$proker->id_kepala and $this->id_kepala!=null)
            $proker->id_kepala           =$this->id_kepala;
        $proker->status               =$this->status;
        $proker->save();


        $this->emit('swalUpdated');
        return redirect()->route($redirect,['id'=>$idToUpdate]);

    }
    


}
