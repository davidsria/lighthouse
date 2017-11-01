<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'meeting_hold', 'location', 'day', 'report_id', 'start_time', 'end_time','duration', 'men', 'women', 'children',
         'highlights', 'guest', 'guest_details',
    ];

    protected $table = "attendances";

    public function user(){
        
        return $this->belongsto(User::class);
    }
}
