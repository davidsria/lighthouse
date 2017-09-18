<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
        'user_id', 'geographicalName_id', 'name', 'telephone', 'sex', 'address', 'status', 'email',
    ];
}
