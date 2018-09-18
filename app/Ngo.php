<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ngo extends Model
{
    //
    use Notifiable;
    protected $table = 'ngo';
    protected $guard = 'ngo';

    protected $fillable = [
            'Email','Password','Ngoname', 'Address', 'Regno', 
    ];

    protected $hidden = [
            'Password', 'remember_token',
     ];
}
