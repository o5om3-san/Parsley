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
            $otsukai = new Otsukai();
            $otsukais = $otsukai->orderBy('deadline', 'asc')->paginate(10);
            $data = ['otsukais' => $otsukais];
            
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

    public function store_otsukai(Request $request)
    {
        $dt = new DateTime();
        $time = $dt->format('Y-m-d').' '.$request->from_hour.':'.$request->from_minutes.':00';
        
        $this->validate($request, [
            'shop_id' => 'required|max:191',
            'capacity' => 'required|max:191',
            'deliverPlace' => 'required|max:191',
        ]);
       
        $request->user()->otsukai_nobita()->create([
            'deadline' => $time,
            'shop_id' => $request->shop_id,
            'capacity' => $request->capacity,
            'deliverPlace' => $request->deliverPlace,
        ]);

        return redirect('/');
    }

    public function show_otsukai($id)
    {
        $otsukai = Otsukai::find($id);
        $requests = $otsukai->request;
        $data = [
            'otsukai' => $otsukai,
            'requests' => $requests,
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
        $time = $dt->format('Y-m-d').' '.$request->from_hour.':'.$request->from_minutes.':00';
        
        $this->validate($request, [
            'deliverPlace' => 'required|max:191',
        ]);
        
        if (\Auth::user()->id === $otsukai->user_id) {
            $request->user()->otsukai_nobita()->update([
                'deadline' => $time,
                'shop_id' => $request->shop_id,
                'capacity' => $request->capacity,
                'deliverPlace' => $request->deliverPlace,
            ]);
        }
        
        return redirect('/');
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
        $data = [
            'otsukai' => $otsukai,
            'shop' => $shop,
            'items' => $items,
            'user' => $user
        ];
        
        
        return view('requests.create_request', $data);
    }
    
    public function store_request(Request $request)
    {
        \Auth::user()->request($request->id, $request->names, $request->amount, $request->comment);
        return redirect('/');
    }
    
    public function edit_request($id)
    {
        $request = OtsukaiGiant::find($id);
        $shop = $request->otsukai->shop;
        $items = $request->otsukai->shop->item;
        $user = $request->otsukai->user;
        
        $data = [
            'request' => $request,
            'shop' => $shop,
            'items' => $items,
            'user' => $user
        ];
        
        if (\Auth::user()->id === $request->otsukai->user_id) {
            return view('requests.edit_request', $data);
        }
        else {
            return redirect('/');
        }
    }
    
    public function update_request(Request $request, $id)
    {
        // //otsukaiのコピペなう
        // $otsukai = Otsukai::find($id);
        // $dt = new DateTime();
        // $time = $dt->format('Y-m-d').' '.$request->from_hour.':'.$request->from_minutes.':00';
        
        // $this->validate($request, [
        //     'deliverPlace' => 'required|max:191',
        // ]);
        
        // if (\Auth::user()->id === $otsukai->user_id) {
        //     $request->user()->otsukai_nobita()->update([
        //         'deadline' => $time,
        //         'shop_id' => $request->shop_id,
        //         'capacity' => $request->capacity,
        //         'deliverPlace' => $request->deliverPlace,
        //     ]);
        // }
        
        // return redirect('/');
    }
    
    public function destroy_request($id)
    {
        $request = OtsukaiGiant::find($id);

        if (\Auth::user()->id === $request->user_id) {
            $request->delete();
        }
        
        return redirect('/');
    }
}
