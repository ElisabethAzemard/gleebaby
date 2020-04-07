<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function caretakers()
    {
        return $this->belongsToMany('App\Caretaker');
    }

    public function practitioner()
    {
        return $this->belongsTo('App\Practitioner');
    }

}
