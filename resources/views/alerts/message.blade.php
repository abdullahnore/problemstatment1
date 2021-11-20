@if(session('Insert_message'))
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{session('Insert_message')}}
</div>


@elseif(session('update_message'))
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{session('update_message')}}
</div>



@elseif(session('delete_message'))
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{session('delete_message')}}
</div>

@elseif(session('cancelled_message'))
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{session('cancelled_message')}}
</div>
@endif

  
