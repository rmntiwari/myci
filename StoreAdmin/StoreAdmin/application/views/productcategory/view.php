<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row">        
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="">Product Category</a></li>       
    </ol>
</div>
    
<?php if($this->session->tempdata('message')): ?>
<div class="alert alert-success">
    <strong><i class="fa fa-fw fa-lg fa-check-circle-o"></i>Success!</strong> <?=$this->session->tempdata('message')?>
</div>
<?php endif;?>
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-list"></i>Product Category List</div>
    <div class="panel-body">
        <button class="btn btn-round btn-primary" onclick="window.location.href='<?=base_url()?>/ProductCategory/Add'"><i class="fa fa-fw fa-plus-circle"></i>Add Product Category</button>
        <button class="btn btn-round btn-danger"><i class="fa fa-fw fa-trash"></i>Delete</button>
        <div class="content-divider"></div>
        <table class="table table-bordered category">
            <thead>
                <tr>
                    <th></th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Sub Category Name</th>
                    <th>Category Name</th>
                    <th>Keyword</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($index = 0; $index < count($productCategory); $index++):?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$productCategory[$index]->productcat_name?></td>
                    <td>
                        <?php for($sub = 0; $sub<count($subcategory); $sub++){
                            if($subcategory[$sub]->subcat_id == $productCategory[$index]->subcat_id):
                                echo $subcategory[$sub]->subcat_name;
                            endif;
                        }?>
                    </td>
                    <td>
                        <?php for($cat = 0; $cat<count($category); $cat++){
                            if($category[$cat]->cat_id == $productCategory[$index]->cat_id):
                                echo $category[$cat]->cat_name;
                            endif;
                        }?>
                    </td>
                    <td><?=$productCategory[$index]->keyword?></td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="window.location.href='<?=base_url()?>ProductCategory/Detail/<?=$productCategory[$index]->productcat_id?>'"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-sm btn-success" onclick="window.location.href='<?=base_url()?>ProductCategory/Edit/<?=$productCategory[$index]->productcat_id?>'"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="window.location.href='<?=base_url()?>ProductCategory/Delete/<?=$productCategory[$index]->productcat_id?>'"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>

    </div>
</div>

<?php
    $page_content = ob_get_contents();
    $page_title = "Product Category";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    $(document).ready(function(){
        $('.category').dataTable();
    });
</script>
