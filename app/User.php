<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function student_details()
    {
        return $this->hasOne('App\student_details');
    }
    public function teacher_details()
    {
        return $this->hasOne('App\teacher_details');
    }
    public function studentresultexam()
    {
      return $this->hasMany('App\studentresultexam');
    }
    public function subject()
    {
      return $this->hasMany('App\subject');
    }
    public function imagepass()
    {
        return '/storage/user/'.$this->image ;
    }
}
