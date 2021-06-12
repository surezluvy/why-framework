<?php
    function index(){
        require_once('setting/function2.php');
        $main = new main();

        $hasil = $main->all("user");
        
        require_once('main/read.php');
    }

    function create(){
        require_once('main/create.php');
    }

    function create_blog(){
        require_once('main/create_blog.php');
    }