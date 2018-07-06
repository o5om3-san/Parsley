<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Otsukai;

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
            
            return view('otsukais.index', [
                'otsukais' => $otsukais,
            ]);
            
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
