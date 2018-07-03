<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>


<div class="panel panel-default">
    <div class="panel-heading">Heading</div>
    <div class="panel-body">
        <button type="button" class="btn btn-default">Default</button>
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-danger">Danger</button>
        
        
        <input type="checkbox"/>
    </div>
</div>


<script>

$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square',
    increaseArea: '20%' // optional
  });
});
</script>
<?php
    $page_content = ob_get_contents();
    $page_title = "Welcome";
    ob_get_clean();
    include 'include/master.php';
?>
    