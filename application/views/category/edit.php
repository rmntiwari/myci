<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/Category">Category</a></li>  
        <li class="active"><a href="<?=base_url()?>/Category/Add">Edit</a></li>       
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Edit Category</div>

    <?php
      $formattr = array('id'=>'editcatfrm', 'name'=>'editcatfrm', 'method' =>'post');
      echo form_open_multipart('catsubcat_controller/editcategory', $formattr);
         
         
         echo $category[0]->cat_id;
        // array(1) { [0]=> array(7) { ["cat_id"]=> string(1) "1" ["cat_name"]=> string(11) "Electronics" ["cat_parent"]=> string(1) "0" ["cat_keyword"]=> string(26) "Mobile, tv, freez, clooler" ["cat_desc"]=> string(20) "All electronic items" ["cat_img"]=> string(0) "" ["cat_status"]=> string(1) "1" } } 
     ?>

         <div class="panel-body">
            <input type="hidden" name="catid" value="<?= $category[0]->cat_id; ?>"/>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control input-sm AlphaValue" value="<?= $category[0]->cat_name?>" id="cat_name" name="cat_name" placeholder="Category Name"/>
                </div>
                <div class="form-group">
                    <label>Category Keyword</label>
                    <input type="text" class="form-control input-sm AlphaValue" value="<?=$category[0]->cat_keyword ?>" id="cat_keyword" name="cat_keyword" placeholder="Category Keyword"/>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control input-sm" onchange="return fileValidation()" id="file" name="image"/>
                </div>
                <div id="imagePreview">
                    <img src="<?=base_url().'uploads/category/'.$category[0]->cat_img ?>"/>
                </div>
            </div>
        </div> 

        <div class="panel-footer">
        <input type="submit" class="btn btn-sm btn-success" value="Save"/>
        <button type="button" onclick="window.location.href='<?=base_url()?>/Category'" class="btn btn-sm btn-danger">Cancel</button>
    </div>

    <?php echo form_close(); ?>
    

</div>

<script src="<?=base_url()?>js/category.js?v=1.0.7" type="text/javascript"></script>
<?php
    $page_content = ob_get_contents();
    $page_title = "Add Category";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>
