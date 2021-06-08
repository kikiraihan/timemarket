<?php

namespace App\Http\Livewire\Umum;

use App\Models\anggotatim;
use App\Models\Pegawai;
use App\Models\Tim;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListAnggota extends Component
{
    public 
    $idTim,
    $isKepalaTim,
    $mode;

    public $search,$selectedPeg;
    public $id_pegawai;

    protected $listeners=[
        'konfirmasiHapusAnggotaTim'=>'HapusPegawai',
    ];

    public function mount($idTim,$isKepalaTim)
    {
        $this->mode=NULL;
        $this->idTim=$idTim;
        $this->isKepalaTim=$isKepalaTim;
    }

    public function render()
    {
        $tim=Tim::find($this->idTim);
        $anggotatims=$tim->anggotatims;

        if($this->search!=null)
        {
            $pegawaiDitemukan=$this->cariPegawai()->get();
        }
        else
        {
            $pegawaiDitemukan=null;
        }

        return view('livewire.umum.list-anggota',compact(['tim','anggotatims','pegawaiDitemukan']));
    }

    public function cariPegawai()
    {
        //pegawai yg sudah masuk
        $tim=Tim::find($this->idTim);
        $arrayId=$tim->AnggotaTimsOnlyId;

        $pegawai=Pegawai::with('anggotaunit.unit','user')->where(function(Builder $query) use ($arrayId){
            return $query
            ->where(function($q){
                $q
                ->where('nama', 'like', '%'.$this->search.'%')
                ->orWhere('nip', 'like', '%'.$this->search.'%')
                ;
            })
            ->whereNotIn('id', $arrayId)
            ;
        })
        ;
        return $pegawai;
    }

    public function pilihPegawai($id)
    {
        $this->id_pegawai=$id;
        $this->selectedPeg=Pegawai::find($id);
    }

    public function batalkanPic()
    {
        $this->id_pegawai=null;
        $this->selectedPeg=null;
    }

    public function TambahPegawai()
    {
        $tim=Tim::find($this->idTim);
        $tim->anggotatims()->attach($this->id_pegawai);
        $this->emit('swalAdded',1);
        
        $this->reset([
            'mode',
            'search',
            'selectedPeg',
            'id_pegawai',
        ]);
    }

    public function HapusPegawai($id_pegawai_hapus)
    {
        $tim=Tim::find($this->idTim);
        if($id_pegawai_hapus!=$tim->id_kepala)
        {
            $tim->anggotatims()->detach($id_pegawai_hapus);
            foreach($tim->getTugasByIdPegawai($id_pegawai_hapus) as $tugasHapus)
            $tugasHapus->delete();
        }
        else
        {
            //kepala tim tidak bisa dihapus
        }

        $this->reset([
            'mode',
        ]);

    }




    public function inputMulai()
    {
        $this->mode="input";
    }

    public function inputBatal()
    {
        $this->mode=NULL;
        $this->batalkanPic();
    }

    public function hapusMulai()
    {
        $this->mode="hapus";
    }
    public function hapusBatal()
    {
        $this->mode=NULL;
    }


}
