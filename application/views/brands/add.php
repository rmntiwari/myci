<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>


<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/Brand">Brand</a></li>      
        <li class="active"><a href="">Add</a></li>   
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Add Brand</div>
    <form id="add_data" method="post" action="<?=base_url()?>Brand/Insert" enctype="multipart/form-data">
    <div class="panel-body">
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Select Category</label><i id="category" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" onchange="category(this.value)" name="catid">
                            <option>Select Category</option>
                            <?php for ($index = 0; $index < count($category); $index++) {?>
                            <option value="<?=$category[$index]->cat_id?>"><?=$category[$index]->cat_name?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Sub Category</label><i id="subcategory" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" id="subcategory_option" name="subcatid">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" class="form-control input-sm AlphaValue" id="name" name="name" placeholder="Brand Name">
                    </div>
                    <div class="form-group">
                        <label>Brand Keyword</label>
                        <input type="text" class="form-control input-sm AlphaValue" id="keyword" name="keyword" placeholder="Keyword">
                    </div>
                    <div class="form-group">
                        <label>Brand Image</label>
                        <input type="file" class="form-control input-sm" onchange="return fileValidation()" id="file" name="image">
                    </div>
                    <div id="imagePreview"></div>
                </div>
            </div>
    </div>
    <div class="panel-footer">
        <input type="submit" value="Save" class="btn btn-success"/>
        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?=base_url()?>Brand'">Cancel</button>
    </div>
    </form>
</div>
<script src="<?=base_url()?>js/brand.js?v=1.0.1" type="text/javascript"></script>
<?php
    $page_content = ob_get_contents();
    $page_title = "Brand";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    function category(id){
        $.ajax({
            type: 'POST',
            url: APPURL+"Brand/SubCat",
            data: {id:id},
            success: function (data) {
                $('#subcategory_option').html(data);
            }
        });
    }
</script>
    