<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/ProductCategory">Product Category</a></li>  
        <li class="active"><a href="">Add</a></li>       
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-plus-circle"></i>Add Product Category</div>
    <form id="add_data" method="post" action="<?=base_url()?>ProductCategory/Insert" enctype="multipart/form-data">
    <div class="panel-body">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Select Category</label>
                <select class="form-control input-sm" onchange="category(this.value)" name="catid">
                    <option value="">Select Category</option>
                    <?php for($index = 0; $index < count($category); $index++){?>
                    <option value="<?=$category[$index]->cat_id?>"><?=$category[$index]->cat_name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Select Sub Category</label>
                <select class="form-control input-sm" id="subcategory_option" name="subcatid" onchange="subcategory(this.value)">
                </select>
            </div>
            <div class="form-group">
                <label>Product Category Name</label>
                <input type="text" class="form-control input-sm" name="name" placeholder="Product Category Name"/>
            </div>
            <div class="form-group">
                <label>Keyword</label>
                <input type="text" class="form-control input-sm" name="keyword" placeholder="Keyword"/>
            </div>
            <div class="form-group">
                <label>Product Category Image</label>
                <input type="file" class="form-control input-sm" onchange="return fileValidation()" id="file" name="image"/>
            </div>
            <div id="imagePreview"></div>
        </div>
        <div class="col-lg-6">
            <label>Product Feature:</label>
            <div id="feature_option"></div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" class="btn btn-sm btn-success"/>
        <button type="button" onclick="window.location.href='<?=base_url()?>/ProductCategory'" class="btn btn-sm btn-danger">Cancel</button>
    </div>
    </form>
</div>

<?php
    $page_content = ob_get_contents();
    $page_title = "Add Product Category";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    function category(id){
        $.ajax({
            type: 'POST',
            url: APPURL+"ProductCategory/SubCat",
            data: {id:id},
            success: function (data) {
                $('#subcategory_option').html(data);
            }
        });
    }
    function subcategory(id){
        $.ajax({
            type: 'POST',
            url: APPURL+"ProductCategory/Feature",
            data: {id:id},
            success: function (data) {
                $('#feature_option').html(data);
            }
        });
    }
    
</script>
