<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function children()
    {
        return $this->hasMany('App\Child');
    }

    public function caretakers()
    {
        return $this->hasMany('App\Caretaker');
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription');
    }
}
