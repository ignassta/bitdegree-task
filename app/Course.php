<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }
}
