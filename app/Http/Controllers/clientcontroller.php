<?php

namespace App\Http\Controllers;
use App\Models\client;

use Illuminate\Http\Request;

class clientcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=auth()->user()->id;
           $data['client_data']=client::where('user_id',$user_id )->get();

        return view('client.index',$data);
 
    
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        
        //
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        $user_id=auth()->user()->id;
        $request->validate(['name'=>'required','email'=>'required']);
        $c= new client();
        $c->name=$request->input('name');
        $c->email=$request->input('email');
        $c->number=$request->input('number');
        $c->user_id= $user_id;
        $c->save();
        return redirect('/client')->with('Insert_message','client added succesfully');
 
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
        $c= client::find($id);
        return view('client.edit')->with('cid',$c);
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
        $user_id=auth()->user()->id;
        $c= client::find($id);
        
        $c->name=$request->get('name');
        $c->email=$request->get('email');
        $c->number=$request->get('number');
        $c->user_id= $user_id;
        $c->updated_at=$request->get('');
        
        $c->save();
        return redirect('/client')->with('Update_message','client updated added succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $c= client::find($id);
        $c->delete();
        return redirect('/client');
        //
    }
}
