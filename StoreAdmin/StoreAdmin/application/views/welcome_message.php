<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
?>

<?php
    $page_content = ob_get_contents();
    $page_title = "Welcome";
    ob_get_clean();
    include 'include/master.php';
?>
    