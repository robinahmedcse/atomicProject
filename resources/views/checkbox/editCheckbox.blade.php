<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Edit,check box </title>
    </head>



    <body>
        
        
        
        <div class="container">
 
               <hr>
            

               {!! Form::open(['url'=>'/checkbox/update/data','method'=>'POST','class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
               {{csrf_field()}}
               <div class="form-group">
                    <div class="form-check">
                       
                        <input class="form-check-input" type="checkbox" name="hobby[]" value="c++" 
                              {{in_array("c++",$all_data)?"checked":""}} id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            C++
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" value="php"
                              {{in_array("php",$all_data)?"checked":""}}  id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            php
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" value="laravel" 
                             {{in_array("laravel",$all_data)?"checked":""}}   id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Laravel
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" value="Java" 
                              {{in_array("Java",$all_data)?"checked":""}}  id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Java
                        </label>
                    </div>
                </div>
 <input type="hidden" value="{{$id}}" name="number"><br>
               <input class="btn btn-primary" type="submit" value="Update">
              {!! Form::close() !!}

        </div>









        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>