<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Str;

class Child extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'date_of_birth'
    ];

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function getAge()
    {
        $age = $this->date_of_birth->diff(\Carbon\Carbon::now());

        // if under two, return age in months
        if ($age->y <= 2) {
            // if under one month, return age in days
            if ($age->m < 1) {
                $days = $this->date_of_birth->diff(\Carbon\Carbon::now())->format('%d');
                $ageInDays = $days.' '.Str::plural('jour', $days);
                return $ageInDays;
            } else {
                $ageInMonths = $this->date_of_birth->diff(\Carbon\Carbon::now())->format('%m mois et %d jour(s)');
                return $ageInMonths;
            }
        } else {
            return $age->format('%y ans');
        }
    }

    public function getBirthdate()
    {
        return $this->date_of_birth->locale('fr')->isoFormat('D MMMM YYYY');
    }
}
