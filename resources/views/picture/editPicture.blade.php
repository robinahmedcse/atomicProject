<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Edit Profile Picture</title>
    </head>



    <body>

        <div class="container">
              @include('includes.menu')

                 <br><br><hr>
               <div class="card">
                   <h2>Photo<span class="badge badge-secondary"></span></h2>
                   
               </div>
               <hr>


            {!! Form::open(['url'=>'/profile/picture/update/data','method'=>'POST','class'=>'form-horizontal form-label-left', 'enctype'=>'multipart/form-data']) !!}
            {{csrf_field()}}

            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" name="Name" value="{{$all_data->photo_name}}">
                <input type="hidden" class="form-control" name="number" value="{{$all_data->photo_id}}">
                 <input type="hidden" class="form-control" name="previousImage" value="{{$all_data->photo_url}}">
            </div>
            
             <div class="form-group">
                <label for="formGroupExampleInput">Previous Photo</label>
                <img src="{{asset($all_data->photo_url)}}" width="20%">
            </div>



            <div class="form-group">
                <div class="col-lg-7 ">

                    <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Upload New photo
                    </label>
                    <br>
                    <input  name="photo" class="userPhoto"
                            type="file" accept="image/x-png,image/gif,image/jpeg">

                    <button type="button" id="remove_photo" class="btn btn-danger" style="width: 40%; display: none;">
                        <span class="ladda-label">Remove?</span></button>
                </div>

                <div class="col-lg-5">
                    <div class="row">
<!--                        <img class="pre_img" src="{{asset('public/image/')}}/no_img.jpg" style="width: 40%; max-width: 40%;">-->
                        <p class="image_view"></p>
                    </div>
                </div>
            </div>



            <input class="btn btn-primary" id="submit" type="submit" value="Update">
            {!! Form::close() !!}

        </div>







        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





    </script>

</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(function () {
    //logo image preview 
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.pre_img').hide();
                $('.image_view').after('<img src="' + e.target.result + '" width="40%" />');
                $('.photos img').css('max-width', '100%');
                $("#remove_photo").show(200);
                $(".custom-file-upload").slideUp(0);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.userPhoto').change(function () {
        filePreview(this);
        $('.upload_photo').show();
    });

    //remove logo img 
    $("#remove_photo").click(function () {
        $('.photos img').hide();
        $('.pre_img').show();

        $('.userPhoto').val('');
        $("#remove_photo").slideUp(300);
        $('.upload_photo').slideUp();
        $('.custom-file-upload').slideDown(0);
    });

    $(".upload_photo").click(function () {
        var new_img = $('.new_img').attr('src');
        $('.pre_img_main').attr('src', new_img);
        var mainPhto = $('.userPhoto').val();
        alert(mainPhto);
    });

})
</script>







<script type="text/javascript">/*
 function fileValidation(){
 var fileInput = document.getElementById('file');
 var filePath = fileInput.value;
 var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
 if(!allowedExtensions.exec(filePath)){
 alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
 fileInput.value = '';
 return false;
 }else{
 //Image preview
 if (fileInput.files && fileInput.files[0]) {
 var reader = new FileReader();
 reader.onload = function(e) {
 document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
 };
 reader.readAsDataURL(fileInput.files[0]);
 }
 }
 }
 
 */
</script>

</body>
</html>