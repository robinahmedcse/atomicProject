<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>manage Title</title>

        <script>
            function one_delete() {
                var check = confirm("are you sure to delete this");
                if (check) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>

    </head>



    <body>

        <div class="container">

            @include('includes.menu')


            <br><br><hr>
            @if(session('errors'))
                @foreach($errors as $error )
                   <li>{{$error}}</li>
                       
                @endforeach
            @endif
            
            @if(session('success'))
                  {{session('success') }}
            @endif
            <hr>

            {!! Form::open(['url'=>'/book/title/save/excel','method'=>'POST','class'=>'form-horizontal form-label-left', 'enctype'=>'multipart/form-data']) !!}
            {{csrf_field()}}
            <div class="form-group">
                <div class="col-lg-7 ">

                    <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Upload Excel File :
                    </label>
                  
                      <input  name="file"  type="file" accept=".xlsx,.xls,.csv"> 
                      <input class="btn btn-warning" type="submit" value="submit Excel file">
                   </div>
                <br>           
            </div>
            {!! Form::close() !!}
 
            <hr>


            <div class="">
                <h4 class="tex text-center text-danger">{{Session::get('title')}}
<?php
Session::put('title', NULL);
?>
                </h4>
            </div> 


            <div id="table-data">
                @include('paginationTitle.blade')
            </div>

        </div>









        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

<script>
    
    $(document).reday(function(){
         $(document).on('click','.pagination a', function(event){
             event.preventDefault();
             var page = $(this).attr('href').split('page=')[1];
             fetch_data(page);
         });
        
    });
    
    function fetch_data(page)
 {
  $.ajax({
   url:"pagination/book/title/fetch_data?page="+page,
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
 }
 
});
    
    </script>