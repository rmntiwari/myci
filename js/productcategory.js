/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$('#add_data').submit(function(e){
//    e.preventDefault();
    var name = $('#name').val();
    var keyword = $('#keyword').val();
    var image = $('#image').val();
    var regex = new RegExp("(.*?)\.(jpg|png|jpeg)$");
    
    if(name == ''){
        $('#name').after("<span style='color:red; font-weight:bold;'>Please! Fill the name.</span>");
        return false;
    }else if(keyword == ''){
        $('#keyword').after("<span style='color:red; font-weight:bold;'>Please! Fill the keyword.</span>");
        return false;
    }else if((regex.test(image))) {
        $(this).val('');
        $('#image').after("<span style='color:red; font-weight:bold;'>Please select correct file format.</span>");
        return false;
    }else{
        return true;
    }
      
});