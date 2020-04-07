<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    public function family()
    {
        return $this->belongsTo('App\Family');
    }
}
