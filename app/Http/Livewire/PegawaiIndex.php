<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class PegawaiIndex extends Component
{
    use WithPagination;

    public 
    $unit,
    $search,
    $pegawaisearch,
    $jumlah_pegawai;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // $this->unit=null;
        // $this->search=null;
    }

    public function render()
    {
        if($this->search==null)
        {
            $this->unit=Unit::with('anggotaunits.pegawai.user')->orderBy('singkatan','asc')->get();
            $this->jumlah_pegawai=Pegawai::count();
        }
        else{
           $this->pegawaisearch=$this->cariPegawai(); 
        }

        return view('livewire.pegawai-index');
    }


    public function cariPegawai()
    {
        $pegawai=Pegawai::with('anggotaunit.unit','user')->where(function(Builder $query){
            return $query
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orWhere('nip', 'like', '%'.$this->search.'%');
        })
        ->get()
        ;
        $this->jumlah_pegawai=$pegawai->count();
        return $pegawai;
    }

}
