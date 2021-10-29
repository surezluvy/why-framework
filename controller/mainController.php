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

    function delete($get){
        $main = new main();
        $main->delete("user", $get['id'], "/");
    }

    function edit(){
        require_once('main/edit_user.php');
    }

    function process_edit($get){
        $value = array();
        $row = array();

        $data = new main();

        foreach ($_POST as $name => $val)
        {
            array_push($value, $_POST[htmlspecialchars($name)]);
            array_push($row, htmlspecialchars($name));
        }

        $data->update("user", $row, $value, "/");
    }
