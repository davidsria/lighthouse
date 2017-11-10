<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
        'user_id', 'geographicalName_id', 'name', 'telephone', 'sex', 'address', 'status', 'email','birthday','anniversary'
    ];

    public function user(){
        
        return $this->belongsto(User::class);
    }

     //this is for the archive links to direct us to members for the particular user
     public function scopeFilter($query, $filter)
     {
        if (!is_null($filter)) {
            return $query->where('user_id', 'konnectArea->id');
        }

        return $query;

     
     
     } 
 
     
}
