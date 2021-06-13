<?php
    require_once('setting/function.php');
        
    function index(){
        $main = new main();
        $ambil_data = $main->all("user");
        
        require_once('main/read.php');
    }

    function create(){
        require_once('main/create.php');
    }

    function create_blog(){
        require_once('main/create_blog.php');
    }

    function delete($id){
        $main = new main();
        $main->delete("user", $id, "/");
    }

    function edit(){
        require_once('main/edit_user.php');
    }

    function process_edit($id){
        $main = new main();
        $main->update("user", $id, "/");
    }