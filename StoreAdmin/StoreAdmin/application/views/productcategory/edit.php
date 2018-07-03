<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$f = explode(",", $record[0]->feature_id);
?>

<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/SubCategory">Sub Category</a></li>  
        <li class="active"><a href="">Edit</a></li>       
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-edit"></i>Edit Sub Category</div>
    <form id="add_data" method="post" action="<?=base_url()?>ProductCategory/Insert" enctype="multipart/form-data">
    <div class="panel-body">
        <input type="hidden" name="productcatid" value="<?=$record[0]->productcat_id?>"/>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Select Category</label>
                <select class="form-control input-sm" onchange="category(this.value)" name="catid">
                    <option value="">Select Category</option>
                    <?php for($index = 0; $index < count($category); $index++){?>
                    <option value="<?=$category[$index]->cat_id?>" <?php if($category[$index]->cat_id == $record[0]->cat_id){ echo 'selected';}?>><?=$category[$index]->cat_name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Select Sub Category</label>
                <select class="form-control input-sm" id="subcategory_option" name="subcatid" onchange="subcategory(this.value)">
                    <option value="">Select Sub Category</option>
                    <?php for($index = 0; $index < count($subcategory); $index++){?>
                    <option value="<?=$subcategory[$index]->subcat_id?>" <?php if($subcategory[$index]->subcat_id == $record[0]->subcat_id){ echo 'selected';}?>><?=$subcategory[$index]->subcat_name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>Product Category Name</label>
                <input type="text" class="form-control input-sm" value="<?=$record[0]->productcat_name?>" name="name" placeholder="Product Category Name"/>
            </div>
            <div class="form-group">
                <label>Keyword</label>
                <input type="text" class="form-control input-sm" value="<?=$record[0]->keyword?>" name="keyword" placeholder="Keyword"/>
            </div>
            <div class="form-group">
                <label>Product Category Image</label>
                <input type="file" class="form-control input-sm" onchange="return fileValidation()" id="file" name="image"/>
            </div>
            <div id="imagePreview">
                <img src="<?=base_url().'uploads/productcategory/'.$record[0]->image?>"/>
            </div>
        </div>
        <div class="col-lg-6">
            <label>Product Feature:</label>
            <div id="feature_option">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Feature Name</th>
                            <th>Feature Values</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($index = 0; $index < count($feature); $index++):
                            if($feature[$index]->subcat_id == $record[0]->subcat_id){
                                if(in_array($feature[$index]->feature_id, $f)){
                                    $status = "checked=''";
                                }else{
                                    $status = "";
                                }
                        ?>
                        <tr>
                            <td><input type="checkbox" value="<?=$feature[$index]->feature_id?>" name="feature[]" <?=$status?>/></td>
                            <td><?=$feature[$index]->feature_name?></td>
                            <td><?=$feature[$index]->feature_values?></td>
                        </tr>
                        <?php }
                        endfor;
                        ?>
                    </tbody>
                </table>                
            </div>
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
    $page_title = "Edit Sub Category";
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