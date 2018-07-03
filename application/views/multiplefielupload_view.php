<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
        <form enctype="multipart/form-data" action="<?php echo base_url();?>multifileupload_controller/uploadfiles" method="post">
            <div class="form-group">
                <label>Choose Files</label>
                <input type="file" class="form-control" name="userFiles[]" multiple/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD"/>
            </div>
        </form>
    </div>
    <div class="row">
        <ul class="gallery1">
            <blockquote>
            <?php if(!empty($files)): foreach($files as $file): ?>

                <li class="item" style="float:left; border:0px solid black; list-style: none; margin-right: 10px;">
                    <a style="border:0px;" class="thumbnail  imgzoom1" data-fancybox="gallery" rel="ligthbox" href="<?php echo  $image_path =  base_url().'images/'.$file['file_name']; ?>">
                    <img  class="img-responsive " src="<?php echo  $image_path =  base_url().'images/'.$file['file_name']; ?>" alt="" style="height:90px; width:100px;  box-shadow: 10px 10px 5px #888888;" >
                    </a>
                    <p style="font-size: 10px;"><span><input type="checkbox" value="<?php echo $file['id']; ?>" id="<?php echo $file['id']; ?>" class="delchkbx" name="deletedfile[]" /> </span> <span>Uploaded On <?php echo date("j M Y",strtotime($file['created'])); ?></span></p>

                </li>

            <?php endforeach; else: ?>
                <p>Image(s) not found.....</p>
            <?php endif; ?>
            </blockquote>


        </ul>
    </div>
    <div class="row" style="margin-top: 10px;">
        <p><span  class="btn btn-info btn-block btn-delete" onclick="deletrecords()"><i class="glyphicon glyphicon-remove"></i>Delete</span></p>
    </div>
</div>

<script>

    $('.gallery').fancybox({

        topRatio: 0.4,
        width: 'auto',
        height: 'auto',
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none',

    });

    function deletrecords(){

        var lengthofarray = $('.delchkbx:checkbox:checked').length;
        var myarray = [];
        $('.delchkbx:checkbox:checked').each(function(){

            myarray.push(this.value);
        });

        $.ajax({
            url:"<?php echo base_url(). 'multifileupload_controller/deletefiles'?>",
            type:"POST",
            data:{"deltedroid":myarray}

        }).done(function(data){

            location.reload();
        });

    }

</script>



</body>

<style>

    .imgzoom1 img{
        display:inline-block;
        border:0;
        width:196px;
        height:210px;

        -webkit-transition: all 200ms ease-in;
        -webkit-transform: scale(1);
        -ms-transition: all 200ms ease-in;
        -ms-transform: scale(1);
        -moz-transition: all 200ms ease-in;
        -moz-transform: scale(1);
        transition: all 200ms ease-in;
        transform: scale(1);
    }
    .imgzoom1 img:hover{
        box-shadow: 0px 0px 150px #000000;
        z-index: 2;
        -webkit-transition: all 200ms ease-in;
        -webkit-transform: scale(1.5);
        -ms-transition: all 200ms ease-in;
        -ms-transform: scale(1.5);
        -moz-transition: all 200ms ease-in;
        -moz-transform: scale(1.5);
        transition: all 200ms ease-in;
        transform: scale(1.5);
    }
</style>
</html>