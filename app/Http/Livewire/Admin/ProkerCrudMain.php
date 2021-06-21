<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class ProkerCrudMain extends Component
{
    use WithPagination;

    public $isiDrop;
    public $idToDropup;

    protected $listeners=[
        'terkonfirmasiHapusPegawai'=>'hapusPegawai',
        'terkonfirmasiResetPasswordPegawai'=>'resetPassword',
    ];


    public function render()
    {
        return view('livewire.admin.proker-crud-main');
    }
}
