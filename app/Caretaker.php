<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Musonza\Chat\Traits\Messageable;

class Caretaker extends Authenticatable
{

    use Notifiable;
    use Messageable;

    protected $guard = "caretaker";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
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

    public function sponsor()
    {
        return $this->belongsTo('App\Sponsor');
    }

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function appointments()
    {
        return $this->belongsToMany('App\Appointment');
    }

    public function form()
    {
        return $this->hasOne('App\CaretakerForm');
    }
}
