@extends('layouts.app')
@section('content')
   
 <div class="container">
 <h1 class="jumbotron text-center text-uppercase">project cancel </h1>

 <div class="container row ">
    <div class="col-sm-4 mx-auto"> 
        <form action="{{action('App\Http\Controllers\projectcontroller@update',$pid->id)}}" method="post">
           @csrf
           @method('PATCH')
           <label for="name">Project Name:</label>
           <input type="text" name="name"  value="{{$pid->name}}" placeholder="Enter name" class="form-control">
           @error('name')
               <span style="color: red">{{$message}}</span>
           @enderror
           <br>
           <label for="client">Client ID:</label>
           <input disabled type="text" name="client" placeholder="Client" class="form-control" value="{{$pid->client_id}}"> 
           @error('client')
               <span style="color: red">{{$message}}</span>
           @enderror <br>
           <label for="status">Project Status:</label>
           <select  name="status" class=" form-control" >
            
            <option value="CANCELLED" selected>CANCELLED</option>
           
            
          </select>
          @error('status')
               <span style="color: red">{{$message}}</span>
           @enderror 
           <br>
           <label for="reason">Cancellation reason:</label>
           <textarea class="form-control" name="reason" rows="3"></textarea>
           @error('reason')
           <span style="color: red">{{$message}}</span>
       @enderror 
          <br>
           <input type="submit" value="Update" class="btn btn-info btn-block"> 
        </form>
    </div>
 </div>
 
 </div>

@endsection
 
   