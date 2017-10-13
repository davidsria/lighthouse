<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonnectLeader extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];
}
