<?php
    require_once('function2.php');

    if($_GET['type'] == 'create'){
        $value = array();
        $row = array();
        $table = $_GET['table'];

        $data = new main();
        
        foreach ($_POST as $name => $val)
        {
            array_push($value, $_POST[htmlspecialchars($name)]);
            array_push($row, htmlspecialchars($name));
        }

        $data->create($table, $row, $value);
    } else if($_GET['type'] == 'delete'){
        $data = new main();

        $table = $_GET['table'];
        $id = $_GET['id'];

        $data->delete($table, $id);
    } else if($_GET['type'] == 'edit_user'){
        $value = array();
        $row = array();
        $table = $_GET['table'];

        $data = new main();
        
        foreach ($_POST as $name => $val)
        {
            array_push($value, $_POST[htmlspecialchars($name)]);
            array_push($row, htmlspecialchars($name));
        }
        
        $data->update($table, $row, $value);
    }
?>
