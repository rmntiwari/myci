<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "utf-8">
    <title>Students Example</title>
</head>

<body>

<a href = "<?php echo base_url();?>index.php/stud/add_view"> Add </a>

<table border = "1">
    <?php
    $i = 1;
    echo "<tr>";
    echo "<td>Sr#</td>";
    echo "<td>Roll No.</td>";
    echo "<td>Name</td>";
    echo "<td>Edit</td>";
    echo "<td>Delete</td>";
    echo "<tr>";
    //var_dump($records); exit;
     


    foreach($records as $r) {
        echo "<tr>";
        echo "<td>".$i++."</td>";
        echo "<td>".$r->roll."</td>";
        echo "<td>".$r->name."</td>";
        echo "<td><a href = '".base_url()."index.php/stud/edit/".$r->roll."'>Edit</a></td>";
        echo "<td><a href = '".base_url()."index.php/stud/delete/".$r->roll."'>Delete</a></td>";
        echo "<tr>";
    }
    ?>
</table>

</body>

</html>