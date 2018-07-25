<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Otsukai;
use App\OtsukaiGiant;
class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $otsukai = new Otsukai();
        $otsukais = $otsukai->where('user_id', '=', \Auth::id())->orderBy('deadline', 'desc')->paginate(10);

        $otsukai_giant = new OtsukaiGiant();
        $otsukai_giants = $otsukai_giant->where('user_id', '=', \Auth::id())->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'otsukais' => $otsukais,
            'otsukai_giants' => $otsukai_giants
        ];
        
        return view('users.show', $data);
    }
}
