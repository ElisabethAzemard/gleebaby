<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    public function practitioner()
    {
        return $this->belongsTo('App\Practitioner');
    }
}
