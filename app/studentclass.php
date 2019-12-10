<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentclass extends Model
{
    public function group()
    {
        return $this->belongsTo('App\group');
    }
    public function student_details()
    {
        return $this->hasMany('App\student_details');
    }
    public function subject()
    {
        return $this->hasMany('App\subject');
    }
}
