<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function otsukais()
    {
        return $this->hasMany(Otsukai::class);
    }
}
