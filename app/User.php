<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Cashier\Billable;


class User extends Authenticatable
{

    use Billable;
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
    * Metodo che definisce la relazione tra User e Post
    * Ogni User has many (ha molti) Post
    *
    */
    public function post(){
        return $this->hasMany('App\Post');
    }
}
