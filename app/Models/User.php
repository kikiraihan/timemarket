<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    

    public function getGravatarAttribute(){

        // asset('assets_landing/img/avatar_2x.png')

        // gravatar
        $hash=md5( strtolower( trim( $this->email ) ) );

        $gravatar="https://www.gravatar.com/avatar/".$hash.".png?d=robohash&s=200&r=pg";//&d=404,d=mp,d=retro,d=monsterid,d=wavatar,d=robohash

        return $gravatar!=NULL?$gravatar:"https://www.gravatar.com/avatar/?d=robohash&s=200&r=pg";
    }



    
}
