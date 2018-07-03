<?php
/**
 * Created by PhpStorm.
 * User: manoj
 * Date: 2/16/2017
 * Time: 4:01 PM
 */
?>
<html>
<head>
    <title>CI_Pagination</title>

    <style>
        table, th , td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 5px;
        }

        table tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>

<div >
    <table style="margin: 50px auto; border:1px solid red;">
        <tr>
            <th>SR_NO</th>
            <th>USER ID</th>
            <th>NAME</th>
            <th>PHONE</th>
            <th>EMAIL</th>
        </tr>
        <?php
        $i=0;

      //  var_dump($records['records']); exit;
        foreach ($records['records'] as $value) {

        ?>
             <tr>
                 <td><?php echo ++$i ; ?></td>
                 <td> <?php echo $value->empid ; ?></td>
                 <td><?php echo $value->fname . " " .$value->lname  ; ?></td>
                 <td><?php echo $value->phone ; ?></td>
                 <td><?php echo $value->email ; ?> </td>
             </tr>

        <?php }?>

        <tr><td colspan="5">

                <p><?php

                   // var_dump($links[1]);
                    //echo $links[1];
                    echo $links;
                   // exit;

                   /* foreach($links['links'] as $link){
                       var_dump($link);*/
                    //}  ?></p>
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
            </td></tr>

    </table>
</div>

</body>
</html>