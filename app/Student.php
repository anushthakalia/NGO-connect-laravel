<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Model
{
    //
    use Notifiable;
    protected $table = 'student';
    protected $guard = 'student';

    protected $fillable = [
            'Password','Firstname', 'Surname', 'Email', 'College','Phone',
    ];

    protected $hidden = [
            'Password', 'remember_token',
     ];

}

 
    
