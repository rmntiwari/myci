<!DOCTYPE html>
<html lang="en">
    <title>Add a Captcha!</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
<h1>Adding a captcha</h1>
<p>Take a look at <code style="background:rgb(220,220,220);">application/controllers/captcha.php</code> to look at the
    controller used to generate the captcha.</p>

<?php echo validation_errors(); ?>

<?php echo form_open('captcha_controller/'); ?>


<div class="row">
    <div class="col-lg-12 ">
    <label for="name">Name:
        <input id="name" name="name" type="text"  style="margin-left:15px;"/>
    </label>
    </div>
</div>

<div class="row">
    <div class="col-lg-12" style="margin-left:65px;">
    <?php echo $image; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <label for="name">Captcha:
        <input id="captcha" name="captcha" type="text" />
    </label>
    </div>
</div>

<?php echo form_submit("submit", "Submit"); ?>

<?php echo form_close(); ?>

</div>

</body>
</html>
