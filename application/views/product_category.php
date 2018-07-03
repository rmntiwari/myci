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

	<ul>
         
         <?php
         	foreach($categories as $category){

     			echo '<li>'. $category->cat_name. '</li>';
     			if( empty ( $category->sub) ){
     				continue;
     			}
     			else
     			{

     				  echo '<ul>';
     				  foreach ($category->sub as $subcat)
     				  {
     				  	 
     				  	echo'<li>'.$subcat->cat_name.'</li>';

     				  	 	if( empty ( $subcat->sub) )
     				  	 	{
		         				continue;
		         			}
		         			else
		         			{

	         					echo '<ul>';
			         			foreach ($subcat->sub as $subcat) 
			         			{
		         					echo'<li>'.$subcat->cat_name.'</li>';  // enter code below for more level

			         			}

			         			 echo'</ul>';
							}
     				  }
     				  echo '</ul>';      
     			}
         	}
 

         ?>  

		</ul>  

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
