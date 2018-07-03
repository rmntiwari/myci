<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row">        
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="#">Product</a></li>       
    </ol>
</div>
    
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-list"></i>Product List</div>
    <div class="panel-body">
        <button class="btn btn-round btn-primary" onclick="window.location.href='<?=base_url()?>/Product/Add'"><i class="fa fa-fw fa-plus-circle"></i>Add New Product</button>
        <button class="btn btn-round btn-danger"><i class="fa fa-fw fa-trash"></i>Delete</button>
        <div class="content-divider"></div>
        <table class="table table-bordered category dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Sub Category</th>
                    <th>Category</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($index = 0; $index < count($product); $index++):?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?=$product[$index]->product_name?></td>
                    <td><?=$product[$index]->product_name?></td>
                    <td><?=$product[$index]->product_name?></td>
                    <td><?=$product[$index]->product_name?></td>
                    <td><?=$product[$index]->r_price?></td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="window.location.href='<?=base_url()?>Product/Detail/1'"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-sm btn-success" onclick="window.location.href='<?=base_url()?>Product/Edit/1'"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="window.location.href='<?=base_url()?>Product/Delete/1'"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>

    </div>
</div>

<?php
    $page_content = ob_get_contents();
    $page_title = "Product";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    $(document).ready(function(){
        $('.category').dataTable();
    });
</script>
