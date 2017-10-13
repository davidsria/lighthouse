<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class firstTimers extends Model
{
    protected $fillable = [
        'name', 'address', 'date', 'email', 'phone_no', 'sex', 
    ];

    public function user(){
        
        return $this->belongsto(User::class);
    }
}
