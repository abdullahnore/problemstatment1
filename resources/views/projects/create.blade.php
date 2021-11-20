@extends('layouts.app')
@section('content')
   
 <div class="container">
    <h1 class="jumbotron text-center text-uppercase">project create </h1>

 <div class="container row ">
    <div class="col-sm-4 mx-auto"> 
        <form action="{{action('App\Http\Controllers\projectcontroller@store')}}" method="post">
            
           @csrf
           <label for="name">Project Name:</label>
           <input type="text" name="name" placeholder="PROJECT name" class="form-control">
           @error('name')
               <span style="color: red">{{$message}}</span>
           @enderror
           <br>
           <label for="client">Client ID:</label>
           <select  name="client" class=" form-control" >
            <option selected value="">client id</option>
            @foreach ($client_id as $c)
            <option value="{{$c->id}}">{{$c->id}}</option>
           
            @endforeach
          </select>
          @error('client')
               <span style="color: red">{{$message}}</span>
           @enderror 
          <br>
          <label for="status">Project Status:</label>
           <select  name="status" class=" form-control" >
            <option selected value="">Status</option>
            
            <option value="QUEUE">QUEUE</option>
            <option value="PROGRESS">PROGRESS</option>
          
           
            
          </select>
           
           
           <br>
           <input type="submit" value="Insert" class="btn btn-info btn-block"> 
        </form>
    </div>
 </div>
 
 </div>

@endsection
 
   