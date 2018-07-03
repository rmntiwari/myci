<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script>





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>




    <style type="text/css">
        #loader{display: none}
        #preview{display: none}
    </style>
</head>
<body>

<div class="container">

    <blockquote>
        <h2>Image gallery using ajax</h2>
        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>


    <div class="row clear-fix">
        <div class="col-md-12">
            <form class="form-inline" role="form" action="<?php echo base_url()?>imagegallery_controller/do_upload" method="POST" enctype="multipart/form-data">
                <div class="form-group" style="background: #f5f5f5">
                    <label for="">Choose image</label>
                    <input type="file" name="userfile" id="userfile" multiple>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block" style="width: 200px;" value="Add">
                </div>

                <div class="form-group">
                    <img id="loader" src="https://www.proprofs.com/images/loader.gif?v=1" style="height: 30px;">
                </div>

                <!-- preview of image that is going to be uploade in database -->
                <div class="form-group">
                    <img id="preview" src="#" style="height: 80px; border: 1px solid #DDC; " />
                </div>

            </form>

        </div>
    </div>
    <div class="row clear-fix" >
        <div class="col-md-12">
            <!-- Response after uploded image or fail to upload -->
            <div id="response">
            </div>
        </div>
    </div>

    <div class="row clear-fix" style="border:1px solid black; margin-top:10px;padding-left:10px;">
        <h4 id="rmn"> List of  All uploaded image </h4>
        <div class="col-md-12" >
            <div style="margin-top: 1%;">
                <blockquote>
                    <div  id="gallery">

                    </div>

                   <!-- <ul class="list-inline"  id="gallery">

                    </ul>-->

                </blockquote>
            </div>
        </div>
    </div>


    <div class="row clear-fix" style="border:1px solid black; margin-top:10px;padding-left:10px;">

    <a data-fancybox="gallery" href="#imagedetailsview"><img src="http://myci.com/images/Desert.jpg" height="100px" width="100px"></a>
    <div id="imagedetailsview" style="display:none;">
        <span>Raman kumar ..........</span>
       <!-- <iframe  id="myifram" src="http://myci.com/images/myexlfile.xlsx" height="200" width="300" style="display:none;"></iframe> -->
    </div>

        <a data-fancybox="gallery" href="http://myci.com/images/php_tutorial.pdf"><img src="http://myci.com/images/Desert.jpg" height="100px" width="100px"></a>


        <a class="text fancybox.iframe" href="http://myci.com/images/text_file.txt">open css file</a>
        <script>

            $(".text").fancybox();
        </script>


    </div>



</div>
<script>
    $(document).ready(function (){

        loadgallery();

        $("#userfile").change(function(){
            readURL(this);
        });

        function readURL(input) {
            $("#preview").show();

            //console.log(input.files[0]); alert(input.files[0]); //File {name: "Penguins.jpg", lastModified: 1247549551674, lastModifiedDate: Tue Jul 14 2009 11:02:31 GMT+0530 (India Standard Time), webkitRelativePath: "", size: 777835…}

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log(e.target.result);
                    $('#preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        $('form').ajaxForm({

            beforeSend: function() {
                $("#loader").show();
            },
            complete: function(xhr) {
                $("#response").html(xhr.responseText);
                $("#loader").hide();
                $('form').resetForm();
                loadgallery();
            }
        }); //

        function  loadgallery(){
            $.ajax({
                url: '<?php echo base_url() ?>imagegallery_controller/fillGallery',
                type:'GET'
            }).done(function (data){


                $("#gallery").html(data);

                var btnDelete  = $("#gallery").find($(".btn-delete"));
                (btnDelete).on('click', function (e){
                    e.preventDefault();
                    var id = $(this).attr('id');
                    $("#" + id).hide();
                    $.ajax({
                        url:'<?php echo base_url(); ?>imagegallery_controller/deleteimg',
                        data:'id='+id,
                        type:'POST'
                    }).done(function (data){

                        if(data == '1'){
                            alert("Image deleted successfully");
                            loadgallery();
                        }else{
                            alert("something going wrong");
                            loadgallery();
                        }
                    });
                });

            });
        }  // end of loadgallery


    });


   $('.gallery').fancybox({

       topRatio: 0.4,
       width: 'auto',
       height: 'auto',
       autoSize: false,
       closeClick: false,
       openEffect: 'none',
       closeEffect: 'none',

   });


</script>
<style>
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
</style>

<div id="">

</div>
</body>
</html>

<script>
  $('document').ready( function() {

      $('#rmn').click(function () {


          $.fancybox({
              topRatio: 0.4,
              width: 'auto',
              height: 'auto',
              autoSize: false,
              closeClick: false,
              openEffect: 'none',
              closeEffect: 'none',
             // type: 'ajax',
              helpers: {
                  title: null
              },
              'href': 'http://myci.com/images/Desert.jpg'
          });

      });

  });

    


</script>
 