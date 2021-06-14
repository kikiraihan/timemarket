<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pegawai;
use Livewire\Component;
use Livewire\WithPagination;

class PegawaiCrudMain extends Component
{
    use WithPagination;

    public $isiDrop;
    public $idToDropup;
    
    // to update
    public
    $nama, 
    $nip,
    $nomorwa,
    $email,
    $username;

    protected $listeners=[
        'terkonfirmasiHapusPegawai'=>'hapusPegawai'
    ];


    public function render()
    {
        $pegawais=Pegawai::with('user')->get();
        
        $pegawaiToDropUp=null;
        if(isset($this->idToDropup))
        $pegawaiToDropUp=Pegawai::find($this->idToDropup);

        return view('livewire.admin.pegawai-crud-main',compact(['pegawais','pegawaiToDropUp']));
    }

    public function tampilData($isiDrop,$idToDropup)
    {
        // dd('jalan');
        $this->isiDrop=$isiDrop;
        $this->idToDropup=$idToDropup;
    }

    public function tampilEdit($isiDrop,$idToDropup)
    {
        $this->isiDrop=$isiDrop;
        $this->idToDropup=$idToDropup;
        $pegawaiToUpdate=Pegawai::find($idToDropup)->load('user');
        
        $this->nama = $pegawaiToUpdate->nama;
        $this->nip = $pegawaiToUpdate->nip;
        $this->nomorwa = $pegawaiToUpdate->nomorwa;
        $this->email = $pegawaiToUpdate->user->email;
        $this->username = $pegawaiToUpdate->user->username;
    }

    public function hapusPegawai($id)
    {
        Pegawai::find($id)->delete();
    }
}
