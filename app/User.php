<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin','active','membership_id','membership_started','membership_expired','token', 'google2fa_secret', 'google2fa_enabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function scopeSearch($query, $s){
        return $query->where('email', 'like', '%'.$s.'%')
            ->orWhere('name', 'like', '%'.$s.'%');
    }

    public function sendVerificationEmail(){
        return $this->notify(new VerifyEmail($this));
    }

    public function profile(){
        return $this->hasOne('App\Profile');
    }

    public function kycs(){
        return $this->hasMany('App\Kyc');
    }

    public function kyc2s(){
        return $this->hasMany('App\Kyc2');
    }
}
