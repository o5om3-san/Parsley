<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function item()
    {
        return $this->hasMany(Item::class);
    }
    
    public function otsukai()
    {
        return $this->hasMany(Otsukai::class);
    }
}
