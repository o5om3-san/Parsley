<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;
use App\Otsukai;
use App\OtsukaiGiant;
use App\User;
use App\Shop;
use DateTime;

class OtsukaisController extends Controller
{
    public function index()
    { 
        if (\Auth::check()) {
            $dt = new DateTime();
            $otsukai = new Otsukai();
            $otsukais = $otsukai->where('deadline','>',$dt)->orderBy('deadline', 'asc')->paginate(10);
            $amounts = $this->count_amounts($otsukais);
            $data = [
                'otsukais' => $otsukais,
                'amounts' => $amounts,
            ];
            
            return view('otsukais.index', $data);
        } else {
            return view('welcome');
        }
    }
    
    /*のび太(N)の機能*/
    public function create_otsukai()
    {
        $otsukai = new Otsukai();
        $shops = Shop::all();
        $dt = new DateTime();
        $data = [
            'otsukai' => $otsukai,
            'shops' => $shops,
            'dt' => $dt,
        ];
        
        return view('otsukais.create_otsukai', $data);
    }
    
    public function confirm_create_otsukai(request $request)
    {
        $otsukai = new Otsukai();
        $shop = Shop::find($request->shop_id);
        $shop_id = $request->shop_id;
        $dt = new DateTime();
        $time = $dt->format('Y-m-d').' '.$request->from_hour.':'.$request->from_minutes.':00';
        
        $data = [
            'otsukai' => $otsukai,
            'shop' => $shop,
            'time' => $time,
            'request' => $request,
            'shop_id' => $shop_id,
        ];
        
        return view('otsukais.confirm_create_otsukai', $data);
    }

public function store_otsukai(Request $request)
    {
        $dt = new DateTime();
        $deadline = new DateTime($dt->format('Y-m-d').' '.$request->from_hour.':'.$request->from_minutes.':00');
        
        if ($dt < $deadline){
            $this->validate($request, [
                'shop_id' => 'required|max:191',
                'capacity' => 'required|max:191',
                'deliverPlace' => 'required|max:191',
            ]);
       
            $request->user()->otsukai_nobita()->create([
                'deadline' => $deadline,
                'shop_id' => $request->shop_id,
                'capacity' => $request->capacity,
                'deliverPlace' => $request->deliverPlace,
            ]);
            
            return redirect('/');
        }
        
        return redirect()->back();
    }

    public function show_otsukai($id)
    {
        $otsukai = Otsukai::find($id);
        $onegais = $otsukai->request;
        $amount = $this->count_amount($otsukai);
        $data = [
            'otsukai' => $otsukai,
            'onegais' => $onegais,
            'amount' => $amount
        ];
        
        return view('otsukais.show_otsukai', $data);
    }

    public function edit_otsukai($id)
    {
        $otsukai = Otsukai::find($id);
        $shops = Shop::all();
        $data = [
            'otsukai' => $otsukai,
            'shops' => $shops
        ];
        
        if (\Auth::user()->id === $otsukai->user_id) {
            return view('otsukais.edit_otsukai', $data);
        }
        else {
            return redirect('/');
        }
    }

    public function update_otsukai(Request $request, $id)
    {
        $otsukai = Otsukai::find($id);
        $dt = new DateTime();
        $deadline = new DateTime($dt->format('Y-m-d').' '.$request->from_hour.':'.$request->from_minutes.':00');
        
        if ($dt < $deadline){
            $this->validate($request, [
                'shop_id' => 'required|max:191',
                'capacity' => 'required|max:191',
                'deliverPlace' => 'required|max:191',
            ]);
            
            if (\Auth::user()->id === $otsukai->user_id) {
                $request->user()->otsukai_nobita()->where('id', $id)->update([
                    'deadline' => $deadline,
                    'shop_id' => $request->shop_id,
                    'capacity' => $request->capacity,
                    'deliverPlace' => $request->deliverPlace,
                ]);
            }
            
            return redirect('/');
        }
        
        return redirect()->back();
    }

    public function destroy_otsukai($id)
    {
        $otsukai = Otsukai::find($id);

        if (\Auth::user()->id === $otsukai->user_id) {
            $otsukai->delete();
        }
        
        return redirect('/');
    }
    
    /*ジャイアン(G)の機能*/
    public function create_request($id)
    {    
        $otsukai = Otsukai::find($id);
        $shop = $otsukai->shop;
        $items = $otsukai->shop->item;
        $user = $otsukai->user;
        $amount = $this->count_amount($otsukai);
        
        $data = [
            'otsukai' => $otsukai,
            'shop' => $shop,
            'items' => $items,
            'user' => $user,
            'amount' => $amount
        ];
        
        
        return view('requests.create_request', $data);
    }
    
    public function store_request(Request $request)
    {
        \Auth::user()->request($request->id, $request->item, $request->amount, $request->comment);
        return redirect('/');
    }
    
    public function edit_request($id)
    {
        $onegai = OtsukaiGiant::find($id);
        $otsukai = Otsukai::find($onegai->otsukai_id);
        $shop = $onegai->otsukai->shop;
        $items = $onegai->otsukai->shop->item;
        $user = $onegai->otsukai->user;
        $amount = $this->count_amount($otsukai);
        
        $data = [
            'onegai' => $onegai,
            'otsukai' => $otsukai,
            'shop' => $shop,
            'items' => $items,
            'user' => $user,
            'amount' => $amount
        ];
        
        if (\Auth::user()->id === $onegai->user_id) {
            return view('requests.edit_request', $data);
        }
        else {
            return redirect('/');
        }
    }
    
    public function update_request(Request $request, $id)
    {
        $onegai = OtsukaiGiant::find($id);
        $otsukai_id = $onegai->otsukai->id;
        
        if (\Auth::user()->id === $onegai->user_id) {
            $onegai->delete();
            \Auth::user()->request($otsukai_id, $request->item, $request->amount, $request->comment);
        }
        
        return redirect('/');
    }
    
    public function destroy_request($id)
    {
        $onegai = OtsukaiGiant::find($id);

        if (\Auth::user()->id === $onegai->user_id) {
            $onegai->delete();
        }
        
        return redirect('/');
    }
    
    public function mypage()
    { 
        if (\Auth::check()) {
            $otsukai = new Otsukai();
            $otsukais = $otsukai->where('user_id', '=', Auth::id())->orderBy('deadline', 'asc')->paginate(10);
            $data = ['otsukais' => $otsukais];
            
            return view('otsukais.index', $data);
        }
        else {
            return view('welcome');
        }
    }
    
    public function pay($id)
    {
        $user = User::find($id);
        $otsukai_giant = OtsukaiGiant::find($id);
        $item = Item::find($otsukai_giant->item_id);
        $data = [
            'user' => $user,
            'otsukai_giant' => $otsukai_giant,
            'item' => $item
        ];
        return view('requests.pay_request', $data);
    }
    
    public function confirm_create_request(request $request, $id)
    {
        $otsukai = Otsukai::find($id);
        $item_id = $request->item;
        $amount = $request->amount;
        $comment = $request->comment;
        $item = Item::find($item_id);
        
        $data = [
            'otsukai' => $otsukai,
            'item' => $item,  
            'amount' =>$amount,
            'comment' =>$comment,
            'item_id' =>$item_id,
         ];
        return view('requests.confirm_create_request', $data);
    
    }
    
    public function confirm_edit_request(request $request, $id)
    {
        $onegai = OtsukaiGiant::find($id);
        $item_id = $request->item;
        $amount = $request->amount;
        $comment = $request->comment;
        $item = Item::find($item_id);
        
        $data = [
            'onegai' => $onegai,
            'item' => $item,  
            'amount' =>$amount,
            'comment' =>$comment,
            'item_id' =>$item_id,
         ];
         
        return view('requests.confirm_edit_request', $data);
    
    }
    
    public function complete($id){
        
        if (\Auth::check()) {
        $otsukai = Otsukai::find($id);
        $onegais = $otsukai->request;
        $amount = $this->count_amount($otsukai);
        
        $data = [
            'otsukai' => $otsukai,
            'onegais' => $onegais,
            'amount' => $amount
        ];
        
        return view('otsukais.complete', $data);
    }
        else {
            return view ('otsukais.index');
        }
    }
}
