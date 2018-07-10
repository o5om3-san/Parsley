<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function otsukai()
    {
        return $this->belongsToMany(Otsukai::class, 'otsukai_giant', 'otsukai_id', 'user_id')->withPivot('item_id','amount','comment');
    }
    
    public function request($otsukaiId)
    {   
        $this->otsukai()->attach($otsukaiId,['item_id','amount','comment']);
    }
    
}
