<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usertracks extends Model
{
   
    protected $fillable = [
        'email', 'login_time','logout_time','url',
    ];
}
