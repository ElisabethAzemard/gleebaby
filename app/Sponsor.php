<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public function caretakers()
    {
        return $this->hasMany('App\Caretaker');
    }
}
