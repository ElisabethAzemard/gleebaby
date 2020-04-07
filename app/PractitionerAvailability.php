<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PractitionerAvailability extends Model
{
    public function practitioner()
    {
        return $this->belongsTo('App\Practitioner');
    }
}
