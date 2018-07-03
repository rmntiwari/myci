<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>




<div class="container">

<!--<form>-->
  <?php form_open('statecity_controller/index', array('id' => 'myform', 'name' => 'myform')); ?>
 <div class="row">
  <div class="col col-lg-12">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
  </div>
</div>

<div class="row">
  <div class="col col-lg-12">
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
  </div>
</div>

<div class="row">
  <div class="col col-lg-4">
    <div class="form-group"> 
      <select class="custom-select" id="country" name="country">
        <option selected>Country</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
  </div>
  <div class=" col col-lg-4">
    <div class="form-group"> 
      <select class="custom-select " id="state" name="state">
        <option selected>state</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
  </div>
  <div class=" col col-lg-4">
    <div class="form-group"> 
      <select class="custom-select " id="city" name="city">
        <option selected>City</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
  </div>
</div>

<div class="row">
  <div class=" col col-lg-6">
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
  </div >
</div>

<div class="row">
   <div class=" col col-lg-6">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</form>


</body>



<script>

$(document).ready(function(){



  $.ajax({

      type:'post',
      url:'<?php  echo base_url("statecity_controller/getcountry") ?>',
      data:'',
      success:function(data){

       
        var obj = JSON.parse(data);
        var country_options = '<option>select country--</option>';
          
          for(var i=0; i< obj.length; i++){

            
            var country_name = obj[i].country_name;
            var country_id = obj[i].country_id;
             country_options += '<option value ="'+country_id+'">' +country_name+ '</option>';
          }

           $("#country").empty();
           $("#country").append( country_options);

      }
  });


});


$(document).on('change', "#country", function(e){

      var countryid = $('#country').find(":selected").val();      

     $.ajax({

      type:'post',
      url:'<?php  echo base_url("statecity_controller/getstate") ?>',
      data:{'country_id' : countryid },
      success:function(data){

       console.log(data);
        var obj = JSON.parse(data);
        var country_options = '<option>select state--</option>';
          
          for(var i=0; i< obj.length; i++){

            
            var country_name = obj[i].state_name;
            var country_id = obj[i].state_id;
             country_options += '<option value ="'+country_id+'">' +country_name+ '</option>';
          }

           $("#state").empty();
           $("#state").append( country_options);

      }
  });
})


$(document).on('change', "#state", function(e){

      var stateid = $('#state').find(":selected").val();
     
     $.ajax({

      type:'post',
      url:'<?php  echo base_url("statecity_controller/getcity") ?>',
      data:{'state_id' : stateid },
      success:function(data){

       console.log(data);
        var obj = JSON.parse(data);
        var city_options = '<option>select city--</option>';
          
          for(var i=0; i< obj.length; i++){

            
            var city_name = obj[i].city_name;
            var city_id = obj[i].city_id;
             city_options += '<option value ="'+city_id+'">' +city_name+ '</option>';
          }

           $("#city").empty();
           $("#city").append( city_options);

      }
  });
})


</script>




</html>