<?php

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Google import</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Vertical (basic) form</h2>
    <form >

        <p>The form below contains a textarea for comments:</p>

            <div class="form-group">
                <label for="comment">Gmail Contacts:</label>
                <textarea class="form-control txtarea2 mainMessage VREmails" rows="5" id="mail_text_to" name="mail_text_to">
                    <?php
                        if(isset($contacts)){

                            foreach ($contacts as $c){
                                @$contactstr .= $c . ",";
                            }
                            echo $contactstr;
                        }
                    ?>
                </textarea>
            </div>


        <button type="button" class="btn btn-default gmailClass qmgmail_import">Submit</button>
    </form>
</div>


<script>


    $(".qmgmail_import").click(function(){

        if(location.protocol != 'https:'){

            childWindow = window.open('https://accounts.google.com/o/oauth2/auth?client_id=506679682535-96rfk704srckkf19udbjc9np067impu0.apps.googleusercontent.com&redirect_uri=http://myci.com/importcontact_controller/&scope=https://www.google.com/m8/feeds/&response_type=code', 'child', "width=500, height=500, location=no, menubar=no, scrollbars=no, status=no, toolbar=no");
        }
        else{
            childWindow =window.open('https://accounts.google.com/o/oauth2/auth?client_id=506679682535-96rfk704srckkf19udbjc9np067impu0.apps.googleusercontent.com&redirect_uri=http://myci.com/importcontact_controller/&scope=https://www.google.com/m8/feeds/&response_type=code', 'child', "width=500, height=500, location=no, menubar=no, scrollbars=no, status=no, toolbar=no");
        }



    });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).bind('childWindow', function(e, message){
            $("#childMessage").val(message);
        });

        alert( $("#childMessage").val());

        window.opener.$(window.opener.document).trigger('mainWindow', $("#childMessage").val());
        window.close();
    });

</script>

</body>
</html>

