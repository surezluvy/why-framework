<?php
    include 'function.php';

    if($_GET['type'] == 'create'){
        $value = array();
        $row = array();
        $table = $_GET['table'];

        $data = new crud();
        
        foreach ($_POST as $name => $val)
        {
            array_push($value, $_POST[htmlspecialchars($name)]);
            array_push($row, htmlspecialchars($name));
        }

        $data->create($table, $row, $value);
    } if($_GET['type'] == 'delete'){
        $data = new crud();

        $table = $_GET['table'];
        $id = $_GET['id'];

        $data->delete($table, $id);
    } if($_GET['type'] == 'edit_user'){
        $value = array();
        $row = array();
        $table = $_GET['table'];

        $data = new crud();
        
        foreach ($_POST as $name => $val)
        {
            array_push($value, $_POST[htmlspecialchars($name)]);
            array_push($row, htmlspecialchars($name));
        }
        
        $data->edit_user($table, $row, $value);
    }
?>
