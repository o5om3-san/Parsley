<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;

class LineNotifyController extends Controller
{
    // public function notify(Request $request, $id){
    //     $otukai = new Otsukai::find($id);
    //     $message = $this->makeMessage($request, $otsukai);
    //     $this->sendToLine($message);
    //     return redirect('/');
    // }
    
    // public function makeMessage($request, $otsukai)
    // {
        
    //     return $message;
    // }
    
    // public function sendToLine($message)
    // {
    //     $uri = 'https://notify-api.line.me/api/notify';
    //     $client = new Client();
    //     $client->post($uri, [
    //         'headers' => [
    //             'Content-Type'  => 'application/x-www-form-urlencoded',
    //             'Authorization' => 'Bearer '.env('LINE_ACCESS_TOKEN'),
    //         ],
    //         'form_params' => [
    //             'message' => $message,
    //         ]
    //     ]);
    // }
}