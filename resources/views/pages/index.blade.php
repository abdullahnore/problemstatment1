@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
  <h1> Laravel project 1</h1>
  <p>imagine works problem statement 1

  </p>
  <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a> <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register</a></p>
</div>
@endsection


