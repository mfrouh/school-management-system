<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_details extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function studentclass()
    {
        return $this->belongsTo('App\studentclass');
    }

}
