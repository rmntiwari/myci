<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$count = 0;
?>


<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/Feature">Feature</a></li>      
        <li class="active"><a href="">Edit</a></li>   
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Product Features</div>
    <form id="add_data" method="post" action="<?=base_url()?>Feature/Insert" enctype="multipart/form-data">
    <div class="panel-body">
        <input type="hidden" name="featureid" value="<?=$feature[0]->feature_id?>"/>
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Select Category</label><i id="category" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" onchange="category(this.value)" name="catid">
                            <option value="">Select Category</option>
                            <?php for($index = 0; $index < count($category); $index++){?>
                            <option value="<?=$category[$index]->cat_id?>" <?php if($category[$index]->cat_id == $feature[0]->cat_id){ echo 'selected';}?>><?=$category[$index]->cat_name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Select Sub Category</label><i id="subcategory" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" name="subcatid" id="subcategory_option">
                            <option value="">Select Sub Category</option>
                            <?php for($index = 0; $index < count($subcategory); $index++){?>
                            <option value="<?=$subcategory[$index]->subcat_id?>" <?php if($subcategory[$index]->subcat_id == $feature[0]->subcat_id){ echo 'selected';}?>><?=$subcategory[$index]->subcat_name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Feature Name</label>
                        <input type="text" class="form-control input-sm" value="<?=$feature[0]->feature_name?>" name="name" placeholder="Feature Name">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group-sm">
                        <label>Feature Value</label>
                    </div>
                    <?php $values = explode(",", $feature[0]->feature_values);
                    foreach ($values as $value): $count++ ?>
                    <div class="form-group" id="valuerows<?=$count?>">
                        <input type="text" class="form-control input-sm" value="<?=$value?>" name="value[]" placeholder="Feature Value">
                    </div>
                    <?php endforeach; ?>
                    <div id="more_values"></div>
                    <div class="form-group">
                        <button type="button" onclick="add_values()" class="btn btn-sm btn-primary">Add More Values</button>
                        <button type="button" onclick="delete_value()" class="btn btn-sm btn-primary">Delete Value</button>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Feature Keyword</label>
                        <input type="text" class="form-control input-sm" value="<?=$feature[0]->keyword?>" name="keyword" placeholder="Keyword">
                    </div>
                </div>
            </div>
    </div>
    <div class="panel-footer">
        <input type="submit" value="Save" class="btn btn-success"/>
        <button type="button" class="btn btn-success" onclick="window.location.href = '<?=base_url()?>Feature'">Cancel</button>
    </div>
    </form>
</div>

<?php
    $page_content = ob_get_contents();
    $page_title = "Edit Feature";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    var rows = <?=$count?>;
    $(document).ready(function(){
    });
    
    function add_values(){ 
        rows++;
        var element = '<div id="valuerows'+rows+'" class="form-group">'+
                        '<input type="text" class="form-control input-sm" name="value[]" placeholder="Feature Value">'+
                    '</div>';
        $('#more_values').append(element);
    }
    
    function delete_value(){
        if(rows>1){
            $('#valuerows'+rows).remove();
            rows--;
        }
    }
    function category(id){
        $.ajax({
            type: 'POST',
            url: APPURL+"Feature/SubCat",
            data: {id:id},
            success: function (data) {
                $('#subcategory_option').html(data);
            }
        });
    }
</script>
    