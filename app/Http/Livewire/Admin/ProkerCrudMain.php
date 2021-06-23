<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tim;
use Livewire\Component;
use Livewire\WithPagination;

class ProkerCrudMain extends Component
{
    use WithPagination;

    public $isiDrop;
    public $idToDropup;

    protected $listeners=[
        'terkonfirmasiHapusProker'=>'hapusProker',
    ];
    
    protected $paginationTheme = 'tailwind';


    public function render()
    {
        $tims=Tim::with('kepala')->paginate(10);
        
        $timToDropUp=null;
        if(isset($this->idToDropup))
        $timToDropUp=Tim::find($this->idToDropup);

        return view('livewire.admin.proker-crud-main',compact(['tims','timToDropUp']));
    }

    public function tampilData($idToDropup)
    {
        $this->isiDrop="admin.proker-detail";
        $this->idToDropup=$idToDropup;
    }

    public function hapusProker($id)
    {
        Tim::find($id)->delete();
    }
}
