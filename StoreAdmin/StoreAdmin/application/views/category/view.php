<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<div class="row breadcrumb-row">        
    <ol class="breadcrumb">
        <li><a href="<?=base_url()?>/Welcome"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="#">Category</a></li>       
    </ol>
</div>

<?php if($this->session->tempdata('message')): ?>
<div class="alert alert-success">
    <strong><i class="fa fa-fw fa-lg fa-check-circle-o"></i>Success!</strong> <?=$this->session->tempdata('message')?>
</div>
<?php endif; ?>


<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-fw fa-list"></i>Category List</div>
    <div class="panel-body">
        <button class="btn btn-round btn-primary" onclick="window.location.href='<?=base_url()?>Category/Add'"><i class="fa fa-fw fa-plus-circle"></i>Add New Category</button>
        <button class="btn btn-round btn-danger"><i class="fa fa-fw fa-trash"></i>Delete</button>
        <div class="content-divider"></div>
        <table class="table table-bordered category dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Category Icon</th>
                    <th>Category Name</th>
                    <th>Category Keyword</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for($row = 0; $row<count($records); $row++):?>
                <tr>
                    <td></td>
                    <td><img class="image-border" src="<?=base_url().'uploads/category/'.$records[$row]->image?>"/></td>
                    <td><?=$records[$row]->cat_name?></td>
                    <td><?=$records[$row]->keyword?></td>
                    <td>
                        <button class="btn btn-sm btn-success" onclick="window.location.href='<?=base_url()?>Category/Edit/<?=$records[$row]->cat_id?>'"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="window.location.href='<?=base_url()?>Category/Delete/<?=$records[$row]->cat_id?>'"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>

    </div>
</div>

<?php
    $page_content = ob_get_contents();
    $page_title = "Category";
    ob_get_clean();
    require_once(APPPATH."views\include\master.php");
?>

<script>
    $(document).ready(function(){
        $('.category').dataTable();
    });
</script>
