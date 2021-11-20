<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="{{ ('css/app.css')}}">
        <title>{{config('app.name','problem statement 1')}}</title>

     

    </head>
    <body >
   
      <div class="container">
        @include('incnav.nav')
        @yield('content')
      </div>
    
    </body>
</html>