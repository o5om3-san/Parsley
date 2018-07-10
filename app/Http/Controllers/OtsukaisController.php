<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Item;

use App\Otsukai;

use App\Shop;

use App\User;

use DateTime;

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
            $dt = new DateTime();
            $otsukais = $otsukai->where(format($dt))->orderBy('deadline', 'asc')->paginate(10);
            
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
        
        $dt = new DateTime();
        
        return view('otsukais.create',[
                'otsukai' => $otsukai,
                'shops' => $shops,
                'dt' => $dt,
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
            'shop_id' => 'required|max:191',
            'capacity' => 'required|max:191',
            'deliverPlace' => 'required|max:191',
        ]);
        
        $dt = new DateTime();
        $time = $dt->format('Y-m-d').' '.$request->from_hour.':'.$request->from_minutes.':00';
       
        $request->user()->otsukais()->create([
            'deadline' => $time,
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
     
    public function request($id)
    {
        //
    }
 
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
}
