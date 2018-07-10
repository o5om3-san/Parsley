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
    public function request(Request $request)
    {
        // print '<pre>';
        // print $request->id;
        // return print $request;
        
        // \Auth::user()->request($request->id, $request->names, $request->amount, $request->comment);
        \Auth::user()->request($request->id, 17 , $request->amount, $request->comment);
    
        return redirect('/');
    }
    
}