<?php 
    if($_GET['page'] == 'read'){
        include 'read.php';
    } else if($_GET['page'] == 'create'){
        include 'create.php';
    } else if($_GET['page'] == 'create_blog'){
        include 'create_blog.php';
    }
?>