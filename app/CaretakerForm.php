<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaretakerForm extends Model
{
    public function caretaker()
    {
        return $this->belongsTo('App\Caretaker');
    }
}
