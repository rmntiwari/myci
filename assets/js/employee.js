/**
 * Created by manoj on 12/20/2016.
 */

$('.button-collapse').sideNav({
        menuWidth: 300, // Default is 240
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens
    }
);

$(document).ready(function() {

    $('#example').dataTable( {
        "bPaginate": true,
        "bLengthChange": true


    } );

} );

 
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});


function delemp(eid){

    current_url= window.location.href;

   $.ajax({
       url: current_url + "delemployee?id=" + eid,
       type: 'POST',
       success:function(data){
          if(data){
              alert("record deleted successfully!");
              //location.reload();

          }
       },
       error:function(XMLHttpRequest, exception)
       {

       }
   });
}

function getuserbyid(id)
{
    var postData = {
        'id' : id

    };

    $.ajax({
        type: "POST",
        url: "/emp_controller/getuserbyid",
       data: postData , //assign the var here
        success: function(data){

             
            var obj= $.parseJSON(data);

            var empid=obj[0].empid;
            var fname=obj[0].fname;
            var lname=obj[0].lname;
            var phone=obj[0].phone;
            var email=obj[0].email;
            var pass=obj[0].pass;

            $("#first_name").val('');
            $("#last_name").val('');
            $("#phone").val('');
            $("#email").val('');
            $("#pass").val('');

            $("#first_name" +id ).val(fname);
            $("#last_name" +id ).val(lname);
            $("#phone" +id).val(phone);
            $("#email" +id).val(email);
            $("#pass" +id).val(pass);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}


function closemodel(modelid1){
    $('#'+ modelid1).modal('close');
}

function selectcities(dta)
{
    var countryid = dta.options[dta.selectedIndex].value;
    var postData = {
        'cid' : countryid
    };

    $.ajax({
        url: 'form/selectcountry',
        type: 'post',
        data: postData,
        success: (function (data) {

            $('.citiesdrop').empty();
            $('.citiesdrop').html(data);
            $('select').material_select();
        })

    });
}
