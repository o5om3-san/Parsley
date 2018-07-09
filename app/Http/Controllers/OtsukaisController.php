<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Otsukai;

use App\User;

use App\Item;

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
        ;
            return view('otsukais.index');
        }else {
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
        return view('otsukais.create',[
                'otsukai' => $otsukai,
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

        $request->user()->otsukais()->create([
            'deadline' => $request->deadline,
            'shop_id' => $request->shop_id,
            'capacity' => $request->capacity,
            'deliverPlace' => $request->deliverPlace,
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
        //
    }
    
    public function request()
    {    
        $items = Item::all();
        $names = $items->name;
        $prices = $items->price;
        
        return view('otsukais.request',[
                'names' => $names,
                'prices' => $price
        ]);
        
        
        // $items = Item::all();
        // $names = [];
        // $prices= [];
        
        // foreach($items as $item){
        //     array_push($names, $item->name);
        //     array_push($prices, $item->price);
        // }


        // foreach($prices as $price){
        //     ["price"=>$price];
        // }
        
        // return view('otsukais.request');
        
        
        
        // $data = [];
            
        //     $user = \Auth::user();
        //     $items = 
    
        //     $data = [
        //         'user'=>$user,
        //         'items'=>$items,
        //     ];
        //     return view('otsukais.request', $data);
        }
        
}
