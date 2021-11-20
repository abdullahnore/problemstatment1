<?php

namespace App\Http\Controllers;
use App\models\project;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectcontroller extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //     $count['count']= DB::table('projects')->where('user_id',1)->orderBy('client_id')->count('client_id');
        // return $count;
        $user_id=auth()->user()->id;
  
        // //
        $projects['project_data'] = project::where('user_id',$user_id)->get();
        return view('projects.index',$projects);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $user_id=auth()->user()->id;
         $c= client::where('user_id',$user_id )->get();
        
         return view('projects.create')->with('client_id',$c);;
        //
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
        date_default_timezone_set("Asia/kolkata");
        $user_id=auth()->user()->id;
        $request->validate(['name'=>'required','client'=>'required']);
        $p= new project();
        $p->name=$request->input('name');
        $p->status=$request->input('status');
        $p->client_id=$request->input('client');
        $p->user_id= $user_id;
        $p->created_at=date('Y-m-d H:i:s');
        $p->save();
        return redirect('/projects')->with('Insert_message','Project added succesfully');
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
       
      
         $p= project::find($id);
         return view('projects.edit')->with('pid',$p);
    }
    public function cancel($id)
    {
        //
        $p= project::find($id);
        return view('projects.cancel')->with('pid',$p);
     
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
        $p= project::find($id);
        $request->validate(['name'=>'required','status'=>'required']);
        $p->name=$request->input('name');
        $p->status=$request->input('status');
        $p->user_id= $user_id;
      
         if($p->status=='CANCELLED')
         { 
            $request->validate(['reason'=>'required']);
            date_default_timezone_set("Asia/kolkata");
            $p->end_date=date('Y-m-d H:i:s');
            $p->reason=$request->input('reason');
            $p->save();
            return redirect('/projects')->with('cancelled_message','project updated added succesfully');
         } elseif($p->status=='COMPLETED')
       {
        date_default_timezone_set("Asia/kolkata");
        $p->end_date=date('Y-m-d H:i:s');

        $p->save();
        return redirect('/projects')->with('update_message','project updated added succesfully');
       }
         elseif($p->status!='CANCELLED')
       {       
           $p->reason=$request->input('reason');
        $p->end_date=$request->input('');
        $p->save();
        return redirect('/projects')->with('update_message','project updated added succesfully');
       } 
      
       
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
        $p= project::find($id);
        $p->delete();
        return redirect('/projects')->with('delete_message',  'project with ID'." ". $p->id." " .'deleted succesfully');
    }
}
