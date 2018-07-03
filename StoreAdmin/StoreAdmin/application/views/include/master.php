<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=base_url()?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url()?>plugins/metisMenu/metisMenu.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url()?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    
    <!--DATATABLE-->
    <link href="<?=base_url()?>plugins/datatable/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url()?>plugins/datatable/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url()?>plugins/datatable/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url()?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?=base_url()?>plugins/datepicker/moment.js" type="text/javascript"></script>
    <link href="<?=base_url()?>plugins/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url()?>css/style.css?v=1.2.3" rel="stylesheet" type="text/css"/>
    <script src="<?=base_url()?>plugins/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <link href="<?=base_url()?>plugins/iCheck/skins/all.css" rel="stylesheet" type="text/css"/>
    <script src="<?=base_url()?>js/config.js" type="text/javascript"></script>
    <title><?=$page_title?></title>


</head>
<body>

    <div class="wrapper">
        <div class="wrapper-left">
            <?php include 'sidebar.php';?>
        </div>
        <div class="wrapper-right">
            <?php include 'navbar.php';?>
            <div class="container-fluid mobile-container-fluid">
                <?=$page_content;?>
            </div>
        </div>
    </div>
    
    <script src="<?=base_url()?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/metisMenu/metisMenu.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/datatable/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/datatable/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/datatable/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/datatable/js/responsive.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/datatable/js/jszip.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/qtip/jquery.qtip.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/datepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="<?=base_url()?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>js/main.js?v=1.2.2" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
           // $('#menu').metisMenu();
        });

        $(document).ready(function(){
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square',
            increaseArea: '20%' // optional
          });
        });
    </script>
</body>
</html>