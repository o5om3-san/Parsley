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
    
    public function otsukai_nobita()
    {
        return $this->hasMany(Otsukai::class);
    }
    
    public function otsukai_giant()
    {
        return $this->belongsToMany(Otsukai::class,'otsukai_giant','user_id','otsukai_id')->withPivot('item_id','amount','comment');
    }
    
    public function request($otsukaiId, $itemId, $amount, $comment)
    {   
        $this->otsukai_giant()->attach($otsukaiId, ['item_id'=> $itemId,'amount' => $amount,'comment' => $comment]);
    }
    
}
