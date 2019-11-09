<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>manage Title</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
       
            <hr>

             <div id="table_data">
                  @include('pagi.pagination_data')
                
            </div>

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>


<script>
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });

 function fetch_data(page)
 {
       console.log('url id is '+page);
  $.ajax({
    url:"/pagination/fetch_data?page="+page,
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
 }
 
});
</script>
