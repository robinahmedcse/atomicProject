        
<!-- Example single danger button -->

<div class="btn-group">
        <a  class="btn btn-info" href="{{URL::to('/') }}">Home</a>
    </div>
    
<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        checkbox
    </button>
    <div class="dropdown-menu">
        <a  class="btn btn-defult" href="{{URL::to('/checkbox')}}">Add Hobby</a>
        <a  class="btn btn-defult" href="{{URL::to('/checkbox/manage')}}">Manage Hobby</a>

    </div>
</div>


<div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Image
    </button>
    <div class="dropdown-menu">
         <a  class="btn btn-defult" href="{{URL::to('/profile/picture') }}">Add Photo</a>
       <a   class="btn btn-defult" href="{{URL::to('/profile/picture/manage') }}">manage Photo</a>

    </div>
</div>
 
 



 
    
    
 


