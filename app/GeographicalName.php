<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeographicalName extends Model
{
    //
    protected $fillable = [
        'name', 'user_id',
    ];
}
