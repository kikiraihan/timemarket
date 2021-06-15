<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
    ];

    protected $appends=[
        'nama'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    // Relasi
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class,'id_user');
    }


    // setter dan getter
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] =  Hash::make($password);//bcrypt($password);
    }

    
    public function getNamaAttribute(){
        if($this->role('Admin'))
        return $this->username;
        else
        return $this->pegawai->nama;
    }

    public function getGravatarAttribute(){

        // asset('assets_landing/img/avatar_2x.png')

        // gravatar
        $hash=md5( strtolower( trim( $this->email ) ) );

        $gravatar="https://www.gravatar.com/avatar/".$hash.".png?d=robohash&s=200&r=pg";//&d=404,d=mp,d=retro,d=monsterid,d=wavatar,d=robohash

        return $gravatar!=NULL?$gravatar:"https://www.gravatar.com/avatar/?d=robohash&s=200&r=pg";
    }

    public function getAvatarAttribute($value){
        if($value!=NULL){
            return Storage::disk('avatars')->url($value);
            //return '/storage/'.$value;//'/storage/'.$value;

            // $request->user()->getOriginal('avatar')      => "user-avatar/11-2020-04-07 15:05:06.png"
            // $request->user()->avatar                     => "/storage/user-avatar/11-2020-04-07 15:05:06.png"//hasil dari accessor

        }else
        return $this->gravatar;//"https://ssl.gstatic.com/accounts/ui/avatar_2x.png";//default kalau null;
    }




    
}
