<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\notification;
use App\User; 

class notification extends Model
{
   
   
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text','cid','uid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

   

}
