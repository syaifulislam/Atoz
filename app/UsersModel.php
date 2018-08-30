<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends \Cartalyst\Sentinel\Users\EloquentUser
{
    protected $table = 'users';
    
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $loginNames = ['username','email'];
}
