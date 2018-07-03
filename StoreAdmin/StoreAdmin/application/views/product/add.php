<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>


<div class="row">    
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>/Product">Product</a></li>      
        <li class="active"><a href="">Add</a></li>   
    </ol>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-plus-circle"></i>Add New Product</div>
    <form id="add_data" method="post" action="<?=base_url()?>Product/Insert" enctype="multipart/form-data">
    <div class="panel-body">
        <div class="col-lg-7">
            <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Select Category</label><i id="category" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" name="catid" onchange="category(this.value)">
                            <option value="">Select Category</option>
                            <?php for ($index = 0; $index < count($category); $index++) {?>
                                <option value="<?=$category[$index]->cat_id?>"><?=$category[$index]->cat_name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Select Sub Category</label><i id="subcategory" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" name="subcatid" id="subcategory_option" onchange="subcategory(this.value)">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Select Product Category</label><i id="productcategory" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" name="productcatid" id="procategory_option" onchange="productcategory(this.value)">
                        </select>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Select Brand</label><i id="brand" class="fa fa-fw fa-question-circle-o"></i>
                        <select class="form-control input-sm" name="brandid">
                            <option value="">Select Brand</option>
                            <?php for ($index = 0; $index < count($brand); $index++) {?>
                                <option value="<?=$brand[$index]->brand_id?>"><?=$brand[$index]->brand_name?></option>
                            <?php }?>
                        </select> 
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control input-sm" placeholder="Product Name">
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Product Keyword</label>
                        <input type="text" name="keyword" class="form-control input-sm" placeholder="Product Keyword">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Regular Price</label>
                        <input type="text" name="rprice" class="form-control input-sm numberValue" placeholder="Regular Price">
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Offer Discount</label>
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" name="discount" placeholder="Offer Discount" aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-fw fa-percent"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Offer Start Date</label>
                        <div class='input-group date' id='startdate'>
                            <input type='text' class="form-control input-sm" name="start_date" placeholder="DD/MM/YYYY" autocomplete="off" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>   
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Offer End Date</label>
                        <div class='input-group date' id='enddate'>
                            <input type='text' class="form-control input-sm" name="end_date" placeholder="DD/MM/YYYY" autocomplete="off" />
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-10 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="description" rows="5" name="description" placeholder="Description"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="images[]" multiple="" class="form-control input-sm">
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div id="options"></div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" value="Save" class="btn btn-success"/>
        <button type="button" class="btn btn-danger" onclick="window.location.href = '<?=base_url()?>Product'">Cancel</button>
    </div>
    </form>
</div>

<?php
    $page_content = ob_get_contents();
    $page_title = "Feature";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    CKEDITOR.replace( 'description' );
    $(document).ready(function(){
            $('#startdate').datetimepicker({
                format: 'DD/MM/YYYY'
            });   
            $('#enddate').datetimepicker({
                format: 'DD/MM/YYYY'
            });
    });
    function category(id){
        $.ajax({
            type: 'POST',
            url: APPURL+"Product/SubCat",
            data: {id:id},
            success: function (data) {
                $('#subcategory_option').html(data);
            }
        });
    }
    function subcategory(id){
        $.ajax({
            type: 'POST',
            url: APPURL+"Product/ProductCat",
            data: {id:id},
            success: function (data) {
                $('#procategory_option').html(data);
            }
        });
    }
    function productcategory(id){
        $.ajax({
            type: 'POST',
            url: APPURL+"Product/OptionsCat",
            data: {id:id},
            success: function (data) {
                $('#options').html(data);
            }
        });
    }
</script>
    