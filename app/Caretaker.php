<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caretaker extends Model
{
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
