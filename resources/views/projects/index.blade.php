@extends('layouts.app')
@section('content')
    
<div class="container">
  <h1 class="jumbotron text-center text-uppercase">project  </h1>
  <button class="btn btn-warning">
    <a href="{{action('App\Http\Controllers\projectcontroller@create')}}">Add project</a>
</button>
@include('alerts.message')
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
        
          <th scope="col">client_id</th>
         
          <th scope="col">user_id</th>
          <th scope="col">status</th>
          <th scope="col">created_at</th>
          <th scope="col">END_date</th>
        <th scope="col" colspan="3" class="text-center">operation</th>
        <th scope="col">Comment</th>
        </tr>
      </tr>
    </thead>
    <tbody>
      @foreach ($project_data as $p)
      <tr>
      
        {{-- class="text-warning" --}}
        <td>{{$p['id']}}</td>
        <td>{{$p['name']}}</td>
        <td>{{$p['client_id']}}</td>
        <td>{{$p['user_id']}}</td>
        @if($p->status=='QUEUE')
        <td class="text-info"  >{{$p['status']}}</td>
        @elseif($p->status=='PROGRESS')
        <td class="text-secondary"  >{{$p['status']}}</td>
        @elseif($p->status=='COMPLETED')
        <td class="text-success"  >{{$p['status']}}</td>
        @elseif($p->status=='CANCELLED')
        <td class="text-danger"  >{{$p['status']}}</td>
        
        @endif
        <td>{{$p['created_at']}}</td>
      
        <td>{{$p['end_date']}}</td>
        <td>
          <button class="btn btn-primary">
          <a href="projects/{{$p['id']}}/edit" class="text-white">Edit</a>
     </button>
    </td>
     <td>
      <form action="{{action('App\Http\Controllers\projectcontroller@destroy',$p->id)}}" method="post"> 
        @csrf
        @method('delete')
        <input type="submit" value="delete" class="btn btn-info btn-danger">
      
      
      </form>
      </td>
      <td>
        <form action="{{action('App\Http\Controllers\projectcontroller@cancel',$p->id)}}" method="put"> 
          @csrf
          @method('post')
         
          <input type="submit" value="cancel" class="btn btn-info btn-danger">
        
        
        </form>
      </td>
  
      <td>{{$p['reason']}}</td>
       
        
      </tr>
      @endforeach
    
    </tbody>
  </table>
</div>
 
 
   


@endsection
</div>
    