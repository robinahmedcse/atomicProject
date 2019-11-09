<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
 
  
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      
        <title>Drop Down</title>
    </head>



    <body>
        <div class="container">
            @include('includes.menu')
            <br><br><hr>

            <hr>

            {!! Form::open(['url'=>'#','method'=>'POST','class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
            {{csrf_field()}}
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">District</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="district_id" class="form-control">
                        @foreach($all_data as $data)
                        <option value="{{$data->district_id}}">{{$data->district_name}}</option>
                       @endforeach
                    </select>
                </div>
            </div>  

            
            <div class="form-group" style="position:relative">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">upazila</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="upazila_id" class="form-control" id="upazila"> </select>
                    <img id="loader" src="{{asset('public/image/')}}/tenor.gif"  >
                </div>
            </div>  
            
            
            <input type="hidden" id="token_dis" name="token_admin" value="{{ csrf_token()}}">
            
            
            <style>
                #loder{
                    position: absolute;
                    right: 10px;
                    top: 10px;
                    width: 20px; 
                }
            </style>
            
            
            
            
            <script>
                $(function(){
                    var loader=$('#loader'),
                     
                     district=$('select[name="district_id"]'),
                     upazila=$('select[name="upazila_id"]');
                     
                     loader.hide();
                     upazila.attr('disabled','disabled');
                     
                     district.change(function(){
                         var id=$(this).val();
                         console.log(id);
                          token=$('#token_dis').val();
                         
                $.ajax({
                   type:'POST',
                   url:'{{URL::to("/get/upazila")}}',
                        data:{
                      district:id ,
                      _token:token         },
                
               
               success:function(response)
                       {
                          console.log(response);
                            upazila.removeAttr('disabled');
                          $('#upazila').html(response);
                       }
    
               });
                         
                         
                         
                         
                         
                         
                         
                     })//division
                     
                     
                })
            
             </script>




<!--            <input class="btn btn-primary" type="submit">-->
            {!! Form::close() !!}

        </div>









        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>