/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$('#category').qtip({ // Grab some elements to apply the tooltip to
    content: {
        text: 'Click for Add New Category <a href="http://localhost/StoreAdmin/Category/Add" target="_blank">click</a>',
        title: 'Add New Category'
    },
    position: {
        my: 'bottom center',  // Position my top left...
        at: 'top center' // at the bottom right of...
    },
    style: {
        classes: 'qtip-dark qtip-shadow'
    },
    hide: { when: 'mouseout', fixed: true }
});

$('#subcategory').qtip({ // Grab some elements to apply the tooltip to
    content: {
        text: 'Click for Add Sub Category <a href="http://localhost/StoreAdmin/SubCategory/Add" target="_blank">click</a>',
        title: 'Add Sub Category'
    },
    position: {
        my: 'bottom center',  // Position my top left...
        at: 'top center' // at the bottom right of...
    },
    style: {
        classes: 'qtip-dark qtip-shadow'
    },
    hide: { when: 'mouseout', fixed: true }
});  

/* NAVBAR */
$('.mobile_list li a').click(function(){
    $('.wrapper-left').show("slide", {direction: "left" }, 500);
});


/*VALIDATION*/
$('.numberValue').keypress(function (e) {
    var regex = new RegExp("^[0-9-]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});

$('.AlphaValue').keypress(function (e) {
//    var regex = new RegExp("^[A-Za-z_@./#&+-' ]+$");
    var regex = new RegExp("^[0-9-]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (!regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});

function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        $('#file').after("<span style='color:red; font-weight:bold;'>Please upload file having extensions .jpeg/.jpg/.png/.gif only.</span>");
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#file').next().remove();
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

setTimeout(function() {
    $('.alert').slideUp().fadeOut('slow');
}, 3000);

