<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'meeting_hold', 'location', 'date', 'start_time', 'duration', 'men', 'women', 'children', 'highlights', 'guest', 'guest_details',
    ];
}
