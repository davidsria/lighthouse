<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendance(){
        
        return $this->hasMany(Attendance::class);
    }

    public function firstTimer(){
        
        return $this->hasMany(firstTimers::class);
    }

    public function submit(Attendance $attendance){
        
        $this->attendance()->save($attendance);
    }

    public function submitFirstTimer(firstTimers $firstTimers){
        
        $this->firstTimer()->save($firstTimers);
    }

    public function member(){
        
        return $this->hasMany(Member::class);
    }

    public function project(){
        
        return $this->hasMany(Project::class);
    }
}
