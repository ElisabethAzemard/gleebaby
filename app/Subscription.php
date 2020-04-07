<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function family()
    {
        return $this->belongsTo('App\Family');
    }
}
