<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\CalendarLinks\Link;

class Appointment extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'start',
        'end'
    ];

    public function caretakers()
    {
        return $this->belongsToMany('App\Caretaker');
    }

    public function practitioner()
    {
        return $this->belongsTo('App\Practitioner');
    }

    public function getDuration()
    {
        return $duration = $this->start->diffInHours($this->end) . 'h' . $this->start->diff($this->end)->format('%I');
    }

    public function getDay()
    {
        return $duration = $this->start->locale('fr')->isoFormat('D MMMM YYYY');
    }

    public function getTime()
    {
        return $time = $this->start->locale('fr')->isoFormat('HH:mm');
    }

    public function getGoogleCalendarLink()
    {
        $title = $this->purpose;
        $from = $this->start;
        $to = $this->end;

        return Link::create($title, $from, $to)->google();
    }

    public function getiCalLink()
    {
        $title = $this->purpose;
        $from = $this->start;
        $to = $this->end;

        return Link::create($title, $from, $to)->ics();
    }
}
