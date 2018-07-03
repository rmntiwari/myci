<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row">        
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="#">Brand</a></li>       
    </ol>
</div>
<?php if($this->session->tempdata('message')): ?>
<div class="alert alert-success">
    <strong><i class="fa fa-fw fa-lg fa-check-circle-o"></i>Success!</strong> <?=$this->session->tempdata('message')?>
</div>
<?php endif; ?>    
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-list"></i>Brands List</div>
    <div class="panel-body">
        <button class="btn btn-round btn-primary" onclick="window.location.href='<?=base_url()?>Brand/Add'"><i class="fa fa-fw fa-plus-circle"></i>Add New Brand</button>
        <button class="btn btn-round btn-danger"><i class="fa fa-fw fa-trash"></i>Delete</button>
        <div class="content-divider"></div>
        <table class="table table-bordered brand">
            <thead>
                <tr>
                    <th></th>
                    <th>Brand Icon</th>
                    <th>Sub Category</th>
                    <th>Category</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($index = 0; $index < count($brand); $index++) {?>
                <tr>
                    <td></td>
                    <td><img class="image-border" src="<?=base_url().'uploads/brand/'.$brand[$index]->image?>"/></td>
                    <td>
                        <?php for($sub = 0; $sub<count($subcategory); $sub++){
                            if($subcategory[$sub]->subcat_id == $brand[$index]->subcat_id):
                                echo $subcategory[$sub]->subcat_name;
                            endif;
                        }?>
                    </td>
                    <td>
                        <?php for($cat = 0; $cat<count($category); $cat++){
                            if($category[$cat]->cat_id == $brand[$index]->cat_id):
                                echo $category[$cat]->cat_name;
                            endif;
                        }?>
                    </td>
                    <td><?=$brand[$index]->brand_name?></td>
                    <td>
                        <button class="btn btn-sm btn-success" onclick="window.location.href='<?=base_url()?>Brand/Edit/<?=$brand[$index]->brand_id?>'"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="window.location.href='<?=base_url()?>Brand/Delete/<?=$brand[$index]->brand_id?>'"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>
</div>

<?php
    $page_content = ob_get_contents();
    $page_title = "Brand";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    $(document).ready(function(){
        $('.brand').dataTable();
    });
</script>
