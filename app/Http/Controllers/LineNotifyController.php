<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use App\Item;
use App\Otsukai;
use App\OtsukaiGiant;
use App\User;
use App\Shop;
use DateTime;

class LineNotifyController extends Controller
{
    public function notify($id)
    {
        $otsukai = Otsukai::find($id);
        $message = $this->makeMessage($otsukai);
        $this->sendToLine($message);
        return redirect()->back();
    }
    
    public function makeMessage($otsukai)
    {
        $dt = new DateTime();
        $title = $dt->format('Y/m/d H:i')."\n\n".'【商品到着のご連絡】'."\n";
        $orders = '';
        $giants = '';
        
        $onegais = $otsukai->request;
        foreach ($onegais as $onegai){
            $orders .= "\n".'▼'.$onegai->user->name.'さん'."\n";
            $orders .= '・'.$onegai->item->name." ×".$onegai->amount."\n";
            $orders .= '　= '.$onegai->item->price * $onegai->amount.'円'."\n";
            $giants .= '・'.$onegai->user->name.'さん'."\n";
        }
        $line = 'ーーーーーーーーーー';
        $url = '商品受け取り後、下記URLより受け取り報告をお願いいたします。'."\n".'http://parsley-coffee.herokuapp.com/otsukais/'.$otsukai->id.'/payment';
        $announce = "\n".'下記の方は、キャビネット'.$otsukai->deliverPlace.'まで商品を受け取りにきてください。'."\n".$giants."\n".$url."\n\n".'よろしくお願いいたします。';
        $message = $title.$line.$orders.$line.$announce;
        return $message;
    }
    
    public function sendToLine($message)
    {
        $uri = 'https://notify-api.line.me/api/notify';
        $client = new Client();
        $client->post($uri, [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer Q6IkrG7XOcn4wLNxpdz8IyPvfE65jaY0LaMNt0dZziU',
            ],
            'form_params' => [
                'message' => $message,
            ]
        ]);
    }
}