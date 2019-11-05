<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>manage Check box</title>
    </head>



    <body>

        <div class="container">
            <!-- Example single danger button -->
            <div class="btn-group">
                <a  class="btn btn-success" href="{{URL::to('/profile/picture') }}">Add Photo</a>
                <a  class="btn btn-info" href="{{URL::to('/') }}">Home</a>
            </div>
            <br><br>
            <hr>

            
             <div class="">
               <h4 class="tex text-center text-danger">{{Session::get('photo')}}
               <?php 
               Session::put('photo',NULL);
               ?>
               </h4>
             </div> 
 

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead >
                        <tr align="center" >
                            <th class="table-secondary"  >Serial</th>
                            <th class="table-success">Name</th>
                            <th class="table-success">Photo</th>
                            <th class="table-danger">Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        @foreach($all_data as $data)
                        <tr align="center" >
                            <th scope="row">{{$data->photo_id}}</th>
                            <td>{{$data->photo_name}}</td>
                                <td> 
                                    <img src="{{asset($data->photo_url)}}" width="15%">
                                </td>
                            <td>
                                <a href="{{url('/profile/picture/edit/'.$data->photo_id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit">Edit</span>
                                </a> 

                                <a href="{{url('/profile/picture/delete/'.$data->photo_id)}}" class="btn btn-danger"  onclick="return one_delete();">
                                    <span class="glyphicon glyphicon-trash">Delete</span>
                                </a>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>


                </table>
            </div>

        </div>









        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>