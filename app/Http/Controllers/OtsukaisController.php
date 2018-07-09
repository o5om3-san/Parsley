<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Item;

use App\Otsukai;

use App\User;

use App\Shop;


class OtsukaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        if (\Auth::check()) {

            $otsukai = new Otsukai();
            $otsukais = $otsukai->orderBy('deadline', 'asc')->paginate(10);
            
            $data = [
                'otsukais' => $otsukais,
            ];
            
            return view('otsukais.index', $data);
            
        } else {
            return view('welcome');
        }
    }   
    
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $otsukai = new Otsukai;
        
        $shops = Shop::all();
        
        return view('otsukais.create',[
                'otsukai' => $otsukai,
                'shops' => $shops
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'deadline' => 'required',
            'shop_id' => 'required|max:191',
            'capacity' => 'required|max:191',
            'deliverPlace' => 'required|max:191',
        ]);
        // var_dump($request->shop_id);
        $request->user()->otsukai()->create([
            'deadline' => $request->deadline,
            'shop_id' => $request->shop_id,
            'capacity' => $request->capacity,
            'deliverPlace' => $request->deliverPlace,
        ]);

        return redirect('/');
    }
    
    public function store_request(Request $request)
    {
        $this->validate($request, [
            'item' => 'required|max:191',
            'amount' => 'required|max:191',
        ]);
        // var_dump($request->shop_id);
        $request->user()->otsukai()->request([
            'item' => $request->item,
            'amount' => $request->amount,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $otsukai = \App\Otsukai::find($id);

        if (\Auth::user()->id === $otsukai->user_id) {
            $otsukai->delete();
        }
        return redirect('/');
    }
    
    public function request($id)
    {    
        $otsukai = Otsukai::find($id);
        $shop = $otsukai->shop;
        $items =$otsukai->shop->item;
        $user = $otsukai->user;
        
        return view('otsukais.request',[
                'items' => $items,
                'shop' => $shop,
                'otsukai' =>$otsukai,
                'user' =>$user,
        ]);
        }
        
}
