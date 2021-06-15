<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pegawai;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UnitCrudMain extends Component
{
    use WithPagination;

    public $isiDrop;
    public $idToDropUp;
    
    // to update
    public
    $nama, 
    $singkatan,
    $deskripsi,
    $id_kanit,
    $id_katim;

    public $searchKanit, $selectedKanit;
    public $searchKatim, $selectedKatim;

    protected $listeners=[
        'terkonfirmasiHapusUnit'=>'hapusUnit',
    ];

    protected $paginationTheme = 'tailwind';

    protected $CustomMessages = [
        'string' => 'Kolom :attribute, harus berupa teks',
        'required'=>'Kolom :attribute tidak boleh kosong',
        'unique'=>'Data kolom :attribute sudah ada sebelumnya',
    ];

    public function render()
    {

        //keperluan tampil detail
        $units=Unit::with(['kepala','koordinator'])->paginate(8);
        $unitToDropUp=null;
        if(isset($this->idToDropUp))
        $unitToDropUp=unit::find($this->idToDropUp)->load(['kepala','koordinator']);


        // keperluan search
        $alternatifKanit=$this->initAlternatif($this->id_kanit,$this->searchKanit,'kanit');
        $alternatifKatim=$this->initAlternatif($this->id_katim,$this->searchKatim,'katim');
        
        return view('livewire.admin.unit-crud-main',compact(['units','unitToDropUp','alternatifKanit','alternatifKatim']));
    }



    public function initAlternatif($id_terpilih,$search,$mode)
    {
        if($id_terpilih==null and $search!=null)
        {
            $return=$this->cariPegawai($search,$mode)->get();
        }
        else 
        $return=null;

        return $return;
    }

    public function cariPegawai($search,$mode)
    {
        if($mode=="kanit")
        {
            
            $pegawai=Pegawai::with('user')
            ->where(function(Builder $query) use($search){
                return $query
                ->where('nama', 'like', '%'.$search.'%')
                ->orWhere('nip', 'like', '%'.$search.'%');
            })
            ;
        }
        elseif($mode=="katim")
        {
            $pegawai=Pegawai::with('user')
            ->where(function(Builder $query) use($search){
                return $query
                ->where('nama', 'like', '%'.$search.'%')
                ->orWhere('nip', 'like', '%'.$search.'%');
            })->whereHas('user.roles',function ($q){
                $q
                ->where('name','Chief');
            })
            ;

        }


        

        // $ini=Role::with("users.pegawai")
        //     ->whereHas('user',function ($que) use ($search){
        //         $que->whereHas('pegawai', function ($query) use ($search){
        //             $query
        //             ->where('nama', 'like', '%'.$search.'%')
        //             ->orWhere('nip', 'like', '%'.$search.'%');
        //         });
        //     })
        //     ->where('name','Chief')
        //     ->get();
        
        //     $ini->user->map();


        return $pegawai;
    }

    public function pilihKanit($id)
    {
        $this->id_kanit=$id;
        $this->selectedKanit=Pegawai::find($id);
    }

    public function batalkanKanit()
    {
        $this->id_kanit=null;
        $this->selectedKanit=null;
    }

    public function pilihKatim($id)
    {
        $this->id_katim=$id;
        $this->selectedKatim=Pegawai::find($id);
    }

    public function batalkanKatim()
    {
        // dd('katim');
        $this->id_katim=null;
        $this->selectedKatim=null;
    }











    public function tampilData($idToDropUp)
    {
        $this->isiDrop="admin.unit-detail";
        $this->idToDropUp=$idToDropUp;
    }

    public function tampilInput()
    {
        $this->reset([
            'nama', 
            'singkatan',
            'deskripsi',
            'id_kanit',
            'id_katim',
            'searchKanit',
            'searchKatim',
            'selectedKanit',
            'selectedKatim',
        ]);
        $this->isiDrop="admin.unit-create";
    }

    public function newUnit()
    {
        $this->validate( [
            'nama'      =>"required|string", 
            'singkatan' =>"required|string",
            'deskripsi' =>"required|string",
            'id_kanit'  =>"required|integer",
            'id_katim'  =>"required|integer",
        ],$this->CustomMessages);

        $unitNew=new Unit;

        $unitNew->nama = $this->nama; 
        $unitNew->singkatan = $this->singkatan;
        $unitNew->deskripsi = $this->deskripsi;
        $unitNew->id_kepala = $this->id_kanit;
        $unitNew->id_koordinator = $this->id_katim;
        $unitNew->save();
        
        $this->emit('swalAdded',1);
    }

    

    public function tampilEdit($idToDropUp)
    {
        $this->isiDrop="admin.unit-edit";
        $this->idToDropUp=$idToDropUp;
        $unitToUpdate=Unit::find($idToDropUp)->load(['kepala','koordinator']);
        
        $this->nama         =  $unitToUpdate->nama;
        $this->singkatan    =  $unitToUpdate->singkatan;
        $this->deskripsi    =  $unitToUpdate->deskripsi;
        $this->id_kanit     =  $unitToUpdate->kepala->id;
        $this->id_katim     =  $unitToUpdate->koordinator->id;

        $this->selectedKanit=Pegawai::find($this->id_kanit);
        $this->selectedKatim=Pegawai::find($this->id_katim);
    }

    public function updateUnit()
    {
        $unitToUpdate=Unit::find($this->idToDropUp)->load(['kepala','koordinator']);

        $this->validate( [
            'nama'      =>"required|string", 
            'singkatan' =>"required|string",
            'deskripsi' =>"required|string",
            'id_kanit'  =>"required|integer",
            'id_katim'  =>"required|integer",
        ],$this->CustomMessages);

        $unitToUpdate->nama = $this->nama; 
        $unitToUpdate->singkatan = $this->singkatan;
        $unitToUpdate->deskripsi = $this->deskripsi;
        $unitToUpdate->id_kepala = $this->id_kanit;
        $unitToUpdate->id_koordinator = $this->id_katim;
        $unitToUpdate->save();
        
        $this->emit('swalUpdated');
    }


    public function hapusUnit($id)
    {
        Unit::find($id)->delete();
        $this->reset();
    }

}
