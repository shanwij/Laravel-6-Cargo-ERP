@if(session('success'))
    <div class="alert alert-success alert-dismissible" style="margin-left:220px; margin-bottom:0px" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('success') }}
    </div>  
      
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible" style="margin-left:220px; margin-bottom:0px" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('warning') }}
    </div>
@endif
