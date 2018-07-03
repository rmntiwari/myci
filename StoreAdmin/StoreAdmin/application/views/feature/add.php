<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>


<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/Feature">Feature</a></li>      
        <li class="active"><a href="">Add</a></li>   
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Product Features</div>
    <form id="add_data" method="post" action="<?=base_url()?>Feature/Insert" enctype="multipart/form-data">
    <div class="panel-body">
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Select Category</label><i id="category" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" onchange="category(this.value)" name="catid">
                            <option value="">Select Category</option>
                            <?php for($index = 0; $index < count($category); $index++){?>
                            <option value="<?=$category[$index]->cat_id?>"><?=$category[$index]->cat_name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Select Sub Category</label><i id="subcategory" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" name="subcatid" id="subcategory_option">
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Feature Name</label>
                        <input type="text" class="form-control input-sm" name="name" placeholder="Feature Name">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Feature Value</label>
                        <input type="text" class="form-control input-sm" name="value[]" placeholder="Feature Value">
                    </div>
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
                        <input type="text" class="form-control input-sm" name="keyword" placeholder="Keyword">
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
    $page_title = "Add Feature";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    var rows = '';
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
        $('#valuerows'+rows).remove();
        rows--;
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
    