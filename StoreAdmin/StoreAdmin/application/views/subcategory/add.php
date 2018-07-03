<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/SubCategory">Sub Category</a></li>  
        <li class="active"><a href="">Add</a></li>       
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-plus-circle"></i>Add Sub Category</div>
    <form id="add_data" method="post" action="<?=base_url()?>SubCategory/Insert" enctype="multipart/form-data">
    <div class="panel-body">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Select Category</label>
                <select class="form-control input-sm" name="catid">
                    <option>Select Category</option>
                    <?php for ($index = 0; $index < count($category); $index++) {?>
                    <option value="<?=$category[$index]->cat_id?>"><?=$category[$index]->cat_name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Sub Category Name</label>
                <input type="text" class="form-control input-sm AlphaValue" id="name" name="name" placeholder="Sub Category Name"/>
            </div>
            <div class="form-group">
                <label>Keyword</label>
                <input type="text" class="form-control input-sm AlphaValue" id="keyword" name="keyword" placeholder="Keyword"/>
            </div>
            <div class="form-group">
                <label>Sub Category Image</label>
                <input type="file" class="form-control input-sm" onchange="return fileValidation()" id="file" name="image"/>
            </div>
            <div id="imagePreview"></div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" class="btn btn-sm btn-success"/>
        <button type="button" onclick="window.location.href='<?=base_url()?>/SubCategory'" class="btn btn-sm btn-danger">Cancel</button>
    </div>
    </form>
</div>
<script src="<?=base_url()?>js/subcategory.js?v=1.0.1" type="text/javascript"></script>
<?php
    $page_content = ob_get_contents();
    $page_title = "Add Sub Category";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>
