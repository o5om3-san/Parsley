<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
