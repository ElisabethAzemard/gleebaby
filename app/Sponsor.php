<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Musonza\Chat\Traits\Messageable;

class Sponsor extends Authenticatable
{
    use Notifiable;
    use Messageable;

    protected $guard = "sponsor";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fist_name', 'last_name', 'email', 'password',
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

    public function caretakers()
    {
        return $this->hasMany('App\Caretaker');
    }

    public function getParticipantDetailsAttribute()
    {
        return [
            'firstName' => $this->first_name,
            'lastName' => $this->last_name
        ];
    }

}
