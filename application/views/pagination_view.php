<html>
<head>
    <title>Codelgniter pagination</title>
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"> -->
    <link href="<?php echo asset_url();?>css/paginationcss.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>


</head>
<body>
<div class="main">
    <div id="content">
        <h3 id='form_head'>CI Pagination Example </h3><br/>
        <hr>
        <div id="form_input">

            <table style=" ">
                <tr><th>Customer No</th><th>Customer Name</th><th>Last Name </th><th>First Name </th><th>phone</th></tr>
                <?php

                // Show data
                foreach ($results as $data) {

                    echo "<tr>
                        <td>$data->customerNumber</td>
                        <td>$data->customerName </td>
                        <td>$data->contactLastName </td>
                        <td>$data->contactFirstName </td>
                        <td>$data->phone </td>
                    </tr>";

                }
                ?>

            </table>

        </div>
        <div id="pagination">
            <ul class="tsc_pagination">

                <!-- Show pagination links -->
                <?php foreach ($links as $link) {
                    echo "<li>". $link."</li>";
                } ?>
        </div>
    </div>
</div>
</body>
</html>