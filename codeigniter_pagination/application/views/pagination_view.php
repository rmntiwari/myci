<html>
    <head>		
        <title>Codelgniter pagination</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
		
		<style>
			body {
    font-family: 'Raleway', sans-serif;
}
.main
{
    width: 1015px;
    position: absolute;
    top: 10%;
    left: 20%;
}
#form_head
{
    text-align: center;
    background-color: #61CAFA;
    height: 66px;
    margin: 0 0 -29px 0;
    padding-top: 35px;
    border-radius: 8px 8px 0 0;
    color: rgb(255, 255, 255);
}
#content {
    position: absolute;
    width: 450px;
    height: 390px;
    border: 2px solid gray;
    border-radius: 10px;
}
#form_input
{
    margin-left: 110px;
    margin-top: 30px;
}
label
{
    margin-right: 6px;
    font-weight: bold;
}
#pagination{
    margin: 40 40 0;
}
.input_text {
    display: inline;
    margin: 100px;
}
.input_name {
    display: inline;
    margin: 65px;
}
.input_email {
    display: inline;
    margin-left: 73px;
}
.input_num {
    display: inline;
    margin: 36px;
}
.input_country {
    display: inline;
    margin: 53px;
}
ul.tsc_pagination li a 
{ 
    border:solid 1px; 
    border-radius:3px; 
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    padding:6px 9px 6px 9px;
}
ul.tsc_pagination li 
{
    padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{ 
    color:#FFFFFF; 
    box-shadow:0px 1px #EDEDED;
    -moz-box-shadow:0px 1px #EDEDED;
    -webkit-box-shadow:0px 1px #EDEDED; 
}
ul.tsc_pagination 
{ 
    margin:4px 0;
    padding:0px; 
    height:100%;
    overflow:hidden; 
    font:12px 'Tahoma';
    list-style-type:none; 
}
ul.tsc_pagination li 
{ 
    float:left;
    margin:0px;
    padding:0px; 
    margin-left:5px;
}
ul.tsc_pagination li a 
{ 
    color:black; 
    display:block; 
    text-decoration:none;
    padding:7px 10px 7px 10px; 
}
ul.tsc_pagination li a img 
{
    border:none;
}
ul.tsc_pagination li a
{ 
    color:#0A7EC5;
    border-color:#8DC5E6; 
    background:#F8FCFF; 
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{ 
    text-shadow:0px 1px #388DBE;
    border-color:#3390CA; 
    background:#58B0E7; 
    background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
    background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
		
		</style>
    </head>
    <body> 
        <div class="main">
            <div id="content">
                <h3 id='form_head'>Codelgniter Pagination Example </h3><br/>
                <hr>
                <div id="form_input">
                    <?php
                    
                    // Show data
                    foreach ($results as $data) {
                        echo "<label> Id </label>" . "<div class='input_text'>" . $data->id . "</div>" ."<br>" .
                        "<br>" . "<label> Name</label> " . "<div class='input_name'>" . $data->name . "</div>" ."<br>" .
                        "<br>" . "<label> Email </label>" . "<div class='input_email'>" . $data->email . "</div>" ."<br>" .
                        "<br>" . "<label> Mobile No </label>" . "<div class='input_num'>" . $data->mobile_number . "</div>" ."<br>" .
                        "<br>" . "<label> Country </label> " . "<div class='input_country'>" . $data->country . "</div>";
                    }
                    ?>
                </div> 
                <div id="pagination">
                    <ul class="tsc_pagination">
                        
                        <!-- Show pagination links -->
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                         } ?>
                </div>
            </div>
        </div>
    </body>
</html>