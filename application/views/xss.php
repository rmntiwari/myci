<html>
<head>
<title>Codeigniter xss clean</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
<p class="main_note">Check xss_clean() and see the difference you have to enter data <br> between script tag. <b>&lt;script&gt;alert('Hello')&lt;/script&gt;</b> </p>
<div id="content">
<h2 id="form_head">Codelgniter xss clean Demo</h2>
<div id="form_input">
<?php

//create form open tag
echo form_open('xsscsrf_controller/data_submitted');

//create label
echo form_label('Employee Name');

//create name input field
$data_name = array(
'name' => 'emp_name',
'id' => 'emp_name_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Name',
'required' => 'required'
);
echo form_input($data_name);
echo "<br>";
echo "<br>";


echo form_label('Employee Email-ID');
//create email input field
$data_email = array(
'type' => 'email',
'name' => 'emp_email',
'id' => 'e_email_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Email',
'required' => 'required'
);
echo form_input($data_email);
?>
</div>
<div id="form_button">
<?php echo form_submit('submit', 'Submit', "class=''submit"); ?>
</div>
<?php

//Form close.
echo form_close(); ?>
</div>

<?php //This div shown when values submitted. ?>
<?php if (isset($_POST['submit'])) { ?>
<p class="display_note">The data is shown without xss_clean(), when you enter data between script tag, it will be applied in the code.</p>
<div class="display">
<div class="result_head"><h3>For submission with no xss_clean</h3></div>
<div class="data">
<label>name :</label> <?php echo $non_xss['employee_name'] ?><br><br>
<label>Email :</label> <?php echo $non_xss['employee_email'] ?><br><br>
</div>
</div>
<p class="xss_note">This data is shown after xss_clean(), which filter the script tag.</p>
<div class="xss_clean_display">
<div class="result_head"><h3>For submission with xss_clean CodeIgniter</h3></div>
<div class="data">
<label>name :</label> <?php echo $xss_data['employee_name'] ?><br><br>
<label>Email :</label> <?php echo $xss_data['employee_email'] ?><br><br>
</div>
</div>
<p class="note"><b id='note_text'>Note:</b> For best explanation use <b>Firefox</b> or <b>IE Explorer</b></p>
<?php } ?>
</div>
</body>
</html>