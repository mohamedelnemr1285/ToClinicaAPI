<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','related_id','api_token','related_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function related()
    {
        return $this->morphTo();
    }



    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'like', "%" . $name . "%")
                       ->orWhere('mobile', 'like', "%" . $name . "%");


    }
}


/**
 *Encryption keys generated successfully.
Personal access client created successfully.
Client ID: 1
Client secret: NdCCkLcbehrob7fSTK7EPv4JVLETsaFH0MarBRdY
Password grant client created successfully.
Client ID: 2
Client secret: 2ejqbk4cbDFCsjNssrnFd0hiKJIEnqdFiAoqmsXE

 *
 */