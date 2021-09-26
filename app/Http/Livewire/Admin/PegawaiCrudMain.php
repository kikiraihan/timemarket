<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pegawai;
use App\Models\User;
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
    $role,
    $email,
    $username;

    protected $listeners=[
        'terkonfirmasiHapusPegawai'=>'hapusPegawai',
        'terkonfirmasiResetPasswordPegawai'=>'resetPassword',
    ];

    protected $paginationTheme = 'tailwind';

    protected $CustomMessages = [
        'string' => 'Kolom :attribute, harus berupa teks',
        'required'=>'Kolom :attribute tidak boleh kosong',
        'unique'=>'Data kolom :attribute sudah ada sebelumnya',
    ];


    public function render()
    {
        $pegawais=Pegawai::with('user')->paginate(10);
        
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

    public function tampilInput()
    {
        $this->reset([
            'nama', 
            'nip',
            'nomorwa',
            'role',
            'email',
            'username',
        ]);
        $this->isiDrop="admin.pegawai-create";
    }

    public function newPegawai()
    {
        $this->validate( [
            'email'              =>"nullable|email",
            'username'           =>"required|string|unique:App\Models\User,username",
            'nama'               =>"required|string",
            'nip'                =>"required|string",
            'nomorwa'            =>"required|string",
            'role'               =>"required|in:KPw,Pegawai,Chief",
        ],$this->CustomMessages);

        $pegawaiNew=new Pegawai;
        $userNew=new User;

        $userNew->email        = $this->email;
        $userNew->username     = $this->username;
        $userNew->password     = "password";
        $userNew->save();
        $userNew->assignRole($this->role);
        $pegawaiNew->id_user   = $userNew->id;
        $pegawaiNew->nama      = $this->nama;
        $pegawaiNew->nip       = $this->nip;
        $pegawaiNew->nomorwa   = $this->nomorwa;
        $pegawaiNew->save();
        
        $this->emit('swalAdded',1);
    }

    public function tampilEdit($isiDrop,$idToDropup)
    {
        $this->isiDrop=$isiDrop;
        $this->idToDropup=$idToDropup;
        $pegawaiToUpdate=Pegawai::find($idToDropup)->load('user');
        
        $this->nama     = $pegawaiToUpdate->nama;
        $this->nip      = $pegawaiToUpdate->nip;
        $this->nomorwa  = $pegawaiToUpdate->nomorwa;
        $this->email    = $pegawaiToUpdate->user->email;
        $this->username = $pegawaiToUpdate->user->username;
        $this->role     = $pegawaiToUpdate->user->getRoleNames()->first();
    }

    public function updatePegawai()
    {
        $pegawaiToUpdate=Pegawai::find($this->idToDropup)->load('user');

        $this->validate( [
            'email'              =>"nullable|email|unique:App\Models\User,email,".$pegawaiToUpdate->user->id.",",
            'username'           =>"required|string|unique:App\Models\User,username,".$pegawaiToUpdate->user->id.",",
            'nama'               =>"required|string",
            'nip'                =>"required|string",
            'nomorwa'            =>"required|string",
            'role'               =>"required|in:KPw,Pegawai,Chief",
        ],$this->CustomMessages);


        $pegawaiToUpdate->nama              = $this->nama;
        $pegawaiToUpdate->nip               = $this->nip;
        $pegawaiToUpdate->nomorwa           = $this->nomorwa;
        $pegawaiToUpdate->user->email       = $this->email;
        $pegawaiToUpdate->user->username    = $this->username;
        $pegawaiToUpdate->user->save();
        $pegawaiToUpdate->save();
        
        if($pegawaiToUpdate->user->getRoleNames()->first()!=$this->role)
        $pegawaiToUpdate->user->assignRole($this->role);
        
        $this->emit('swalUpdated');
    }

    public function hapusPegawai($id)
    {
        Pegawai::find($id)->delete();
    }

    public function resetPassword($id)
    {
        $p = User::whereHas('Pegawai', function ($q) use ($id){
            $q->where('id', $id);
        })->first();
        $p->password = 'password';
        $p->save();
    }

}
