<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Item;

use App\Otsukai;

use App\User;

use App\Shop;


class OtsukaiGiantController extends Controller
{
    public function request($otsukai)
    {
        \Auth::user()->request($otsukai);
        
        var_dump($_POST);
        exit;
        return redirect('/');
    }
    
}