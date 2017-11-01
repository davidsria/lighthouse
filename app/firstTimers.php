<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class firstTimers extends Model
{
    protected $fillable = [
        'name', 'address', 'date', 'pastor', 'phone_no', 'contact1', 'contact2', 'contact3', 
    ];

    public function user(){
        
        return $this->belongsto(User::class);
    }
}
