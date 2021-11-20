@extends('layouts.app')
@section('content')
    
 <div class="container">
  <h1 class="jumbotron text-center text-uppercase"> client</h1>
   <button class="btn btn-warning">
        <a href="{{action('App\Http\Controllers\clientcontroller@create')}}">Add client</a>
   </button>
   @include('alerts.message')
  <table class="table">
    <thead>
      <tr>
        <th scope="col">client_id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">number</th>
       
        {{-- <th scope="col">active projects</th> --}}
        <th scope="col">user</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
        <th scope="col" colspan="2" class="text-center">operation</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($client_data as $c)
      <tr>
      
       
        <td>{{$c['id']}}</td>
        <td>{{$c['name']}}</td>
        <td>{{$c['email']}}</td>
        <td>{{$c['number']}}</td>
        <td>{{$c['user_id']}}</td>
        <td>{{$c['created_at']}}</td>
        <td>{{$c['updated_at']}}</td>
        <td><button class="btn btn-primary">
          <a href="client/{{$c['id']}}/edit" style="color: white">Edit</a>
     </button></td>
     <td>
      <form action="{{action('App\Http\Controllers\clientcontroller@destroy',$c->id)}}" method="post"> 
        @csrf
        @method('delete')
        <input type="submit" value="delete" class="btn btn-info btn-danger">
      
      </button>
      </form>
      </td>
      
       
        
      </tr>
      @endforeach
    
    </tbody>
  </table>
 
</div>


@endsection
 
   