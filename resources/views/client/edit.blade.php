@extends('layouts.app')
@section('content')
   
 <div class="container">
    <h1 class="jumbotron text-center text-uppercase">client edit </h1>

 <div class="container row ">
    <div class="col-sm-4 mx-auto"> 
        <form action="{{action('App\Http\Controllers\clientcontroller@update',$cid->id)}}" method="post">
           @csrf
           @method('PATCH')
           <label for="name">Cleint Name:</label>
           <input type="text" name="name"  value="{{$cid->name}}" placeholder="Enter name" class="form-control">
           @error('name')
               <span style="color: red">{{$message}}</span>
           @enderror
           <br>
           <label for="email">Client Email:</label>
           <input type="email" name="email" placeholder="Enter email" class="form-control" value="{{$cid->email}}"> 
           @error('email')
               <span style="color: red">{{$message}}</span>
           @enderror <br>
           <label for="number">Client Number:</label>
           <input type="text" name="number" placeholder="Enter number" class="form-control" value="{{$cid->number}}">
           
           <br>
           <input type="submit" value="Update" class="btn btn-info btn-block"> 
        </form>
    </div>
 </div>
 
 </div>

@endsection
 
   