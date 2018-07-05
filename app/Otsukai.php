<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otsukai extends Model
{
    protected $fillable = ['deadline', 'shop_id', 'capacity', 'deliverPlace', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
