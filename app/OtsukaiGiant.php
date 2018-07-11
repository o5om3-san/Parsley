<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtsukaiGiant extends Model
{
    protected $table = 'otsukai_giant';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
