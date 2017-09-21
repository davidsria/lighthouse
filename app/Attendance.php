<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'meeting_hold', 'location', 'date', 'start_time', 'duration', 'men', 'women', 'children',
         'highlights', 'guest', 'guest_details',
    ];

    protected $table = "attendances";

    public function user(){
        
        return $this->belongsto(User::class);
    }
}
