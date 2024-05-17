<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //
    protected $fillable = [
        'name', 'domain','address', 'address', 'phone', 'logo', 'finance_contact', 'technical_contact', 'license_sw_contact'
    ];
}
