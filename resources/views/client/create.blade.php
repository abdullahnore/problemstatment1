@extends('layouts.app')
@section('content')
   
 <div class="container">
 <h1 class="jumbotron text-center text-uppercase">client create </h1>

 <div class="container row ">
    <div class="col-sm-4 mx-auto"> 
        <form action="{{action('App\Http\Controllers\clientcontroller@store')}}" method="post">
            
           @csrf
           <label for="name">Cleint Name:</label>
           <input type="text" name="name" placeholder="Enter name" class="form-control">
           @error('name')
               <span style="color: red">{{$message}}</span>
           @enderror
           <br>
           <label for="email">Client Email:</label>
           <input type="email" name="email" placeholder="Enter email" class="form-control"> 
           @error('email')
               <span style="color: red">{{$message}}</span>
           @enderror <br>
           <label for="number">Client Number:</label>
           <input type="text" name="number" placeholder="Enter number" class="form-control">
           
           <br>
              
           <input type="submit" value="Insert" class="btn btn-info btn-block"> 
        </form>
    </div>
 </div>
 
 </div>

@endsection
 
   