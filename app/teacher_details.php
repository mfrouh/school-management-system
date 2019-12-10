<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher_details extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function subject()
    {
        return $this->hasMany('App\subject');
    }
}
