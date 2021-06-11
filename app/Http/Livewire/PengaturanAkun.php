<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class PengaturanAkun extends Component
{
    use WithFileUploads;

    

    public
    $idUser,
    $avatar,
    $avatarNoRaw,
    $nama,
    $nip,
    $nomorwa,
    $email,
    $username,
    
    $passwordLama,
    $passwordBaru;

    public function mount()
    {
        $user=User::find(Auth::user()->id);
        $pegawai=$user->pegawai;

        
        $this->nama=$pegawai->nama;
        $this->nip=$pegawai->nip;
        $this->nomorwa=$pegawai->nomorwa;
        
        $this->idUser=$user->id;
        // $this->avatar=$user->getRawOriginal('avatar');
        $this->avatarNoRaw=$user->avatar;
        $this->email=$user->email;
        $this->username=$user->username;
        $this->password=null;

    }

    public function render()
    {
        return view('livewire.pengaturan-akun');
    }

    public function update()
    {
        $userToUpdate=User::find($this->idUser);

        $this->validate([
            'avatar' => 'image|nullable', // |max:1024, 1MB Max
            // 'nama' => "required|string",
            // 'nip' => "required|string",
            // 'nomorwa' => "required|string",
            // 'username' => "required|string",
            // 'email' => "required|string",
        ]);        

        if($this->avatar)//jika tidak null
        {
            if($userToUpdate->getRawOriginal('avatar')) //jika tidak null
            Storage::disk('avatars')->delete($userToUpdate->getRawOriginal('avatar'));

            $avatar=$this->avatar->store($this->idUser, 'avatars');
            $userToUpdate->avatar = $avatar;
        }

        
        
        
        $userToUpdate->pegawai->nama=$this->nama;
        $userToUpdate->pegawai->nip=$this->nip;
        $userToUpdate->pegawai->nomorwa=$this->nomorwa;
        $userToUpdate->pegawai->save();
        
        $userToUpdate->username=$this->username;
        $userToUpdate->email=$this->email;
        // $userToUpdate->password=$this->password;
        $userToUpdate->save();

        $this->emit('swalUpdated');
    }


    public function gantiPassword()
    {
        $userToUpdate=User::find($this->idUser);

        //validasi tambahan
        Validator::extend('checkHashedPass', function($attribute, $value, $parameters) use($userToUpdate)
        {
            if( ! Hash::check( $value , $userToUpdate->password ) )
            {
                return false;
            }
            return true;
        });


        //validasi
        $CustomMessages = [
            'string' => 'Kolom :attribute, harus berupa angka',
            'min' => 'Kolom :attribute, harus min 8 huruf',
            'check_hashed_pass' => 'Password lama salah!',
        ];

        $this->validate( [
            'passwordLama'             =>"required|string|min:8|checkHashedPass:" . $this->passwordLama,
            'passwordBaru'              =>"required|string|min:8",
        ],$CustomMessages);


        $userToUpdate->password =  $this->passwordBaru;
        $userToUpdate->save();

        $this->emit('swalUpdated');

    }
}
