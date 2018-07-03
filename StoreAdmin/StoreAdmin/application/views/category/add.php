<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

?>

<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?php echo base_url()?>/Category">Category</a></li>
        <li class="active"><a href="/Category/Add">Add</a></li>
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Add Category</div>
    <form id="add_data" method="post" action="Category/Insert" enctype="multipart/form-data">
    <div class="panel-body">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control input-sm AlphaValue" id="name" name="name" placeholder="Category Name"/>
            </div>
            <div class="form-group">
                <label>Category Keyword</label>
                <input type="text" class="form-control input-sm AlphaValue" id="keyword" name="keyword" placeholder="Category Keyword"/>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control input-sm" onchange="return fileValidation()" id="file" name="image"/>
            </div>
            <div id="imagePreview"></div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" class="btn btn-sm btn-success" value="Save"/>
        <button type="button" onclick="window.location.href='/Category'" class="btn btn-sm btn-danger">Cancel</button>
    </div>
    </form>
</div>

<script src="js/category.js?v=1.0.7" type="text/javascript"></script>
<?php

    $page_content = ob_get_contents();
    $page_title = "Add Category";
    ob_get_clean();
   require_once(APPPATH."views\include\master.php");
?>
