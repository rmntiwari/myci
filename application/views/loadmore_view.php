<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Codeigniter page scroll load more </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 
</head>
<body>
<div class="container">
    <div class="alert alert-info" style="position: fixed; width: 1140px";>
        <h5 style="color: #000000;">Codeigniter load more data on click article</h5>
        <small>By Raman kumar</small>
    </div>
</div>
<div class="container" style="margin-top: 120px;">
    <h3>Ajax customers list</h3>
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>customerNumber</th>
            <th>customerName</th>
            <th>contactLastName</th>
            <th>contactFirstName</th>
            <th>phone</th>
            <th>addressLine1</th>
            <th>addressLine2</th>
            <th>city</th>
            <th>state</th>
            <th>country</th>
            <th>salesRepEmployeeNumber</th>
            <th>creditLimit</th>
        </tr>
        </thead>

        <tbody id="ajax_table">
        </tbody>
    </table>
    </div>
    <div class="container" style="text-align: center">
        <button class="btn" id="load_more" data-val = "0">Load more..<img style="display: none" id="loader" src="https://www.proprofs.com/survey/images/loader.gif?v=1"> </button></div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        getcountry(0);

        $("#load_more").click(function(e){
            e.preventDefault();
            var page = $(this).data('val');
            console.log(page); // 0, 1 , 2, 3....
            getcountry(page);

        });


    });

    var getcountry = function(page){
        $("#loader").show();
        $.ajax({
            url:"<?php echo base_url() ?>Loadmore_Controller/getcustomers",
            type:'GET',
            data: {page:page}
        }).done(function(response){

            $("#ajax_table").append(response);
            $("#loader").hide();
            $('#load_more').data('val', ($('#load_more').data('val')+1));
            scroll();
        });
    };

    var scroll  = function(){
        $('html, body').animate({
            scrollTop: $('#load_more').offset().top
        }, 1000);
    };


</script>
</body>
</html>