<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'fund', 'execution_date', 'user_id',
    ];

    public function user(){
        
        return $this->belongsto(User::class);
    }
}
