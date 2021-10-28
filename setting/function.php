<?php
class main
{
    public $project_location = "/why-framework";

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "why";
    var $connect = "";
    var $ayam = array();

    function __construct()
    {
        $this->connect = new mysqli("$this->host", "$this->username", "$this->password", "$this->database");
    }

    function all($table, $query = "")
    {
        $data = mysqli_query($this->connect, "SELECT * FROM $table $query");
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }
        return $result;
    }

    function create($table, $row, $value, $redirect)
    {
        $main = new Main();
        $project_location = $main->project_location;
        $combine_url = $project_location . $redirect;

        $combine_row = implode(",", $row);
        $combine_value = "'" . implode("','", $value) . "'";
        $true = mysqli_query($this->connect, "INSERT INTO $table ($combine_row) VALUES($combine_value)");

        if ($true) {
            echo "<script>location='$combine_url';</script>";
        }
    }

    function delete($table, $id, $redirect)
    {
        $main = new Main();
        $project_location = $main->project_location;
        $combine_url = $project_location . $redirect;
        mysqli_query($this->connect, "DELETE FROM $table WHERE id_user='$id'") or die(mysqli_error($this->connect));

        echo "<script>location='$combine_url';</script>";
    }

    function update($table, $row, $value, $redirect)
    {
        $main = new Main();
        $project_location = $main->project_location;
        $combine_url = $project_location . $redirect;

        $combine_row = implode(",", $row);
        $combine_value = implode(",", $value);

        $pecah1 = explode(",", $combine_row);
        $pecah2 = explode(",", $combine_value);
        for ($i = 0; $i < 2; $i++) {
            $result = array();
            array_push($result, $pecah1[$i]);
            array_push($result, $pecah2[$i]);
            $final = implode("='", $result) . "'";

            $done = mysqli_query($this->connect, "UPDATE $table SET $final WHERE id_user='$_GET[id]'") or die(mysqli_error($this->connect));
        }
        $done;
        echo "<script>location='$combine_url';</script>";
    }
}

class routes
{
    function get($urls, $controllers, $functions)
    {
        $id = '';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        }

        $request = $_SERVER['REQUEST_URI'];
        $main = new Main();
        $project_location = $main->project_location;

        $explode_url = explode(" ", $urls);
        $explode_controller = explode(" ", $controllers);
        $explode_function = explode(" ", $functions);

        for ($i = 0; $i < count($explode_url); $i++) {

            $combine_url = $project_location . $explode_url[$i];
            $combine_controller = $explode_controller[$i];
            $combine_function = $explode_function[$i];

            $url = $combine_url;
            $controller = "controller/" . $combine_controller . ".php";
            $function = $combine_function;

            if ($request == $url) {
                require_once($controller);
                $function($id);
            }
        }
    }

    function post($url, $table, $redirect)
    {
        $request = $_SERVER['REQUEST_URI'];
        $main = new Main();
        $project_location = $main->project_location;
        $combine_url = $project_location . $url;

        $value = array();
        $row = array();

        $data = new main();

        foreach ($_POST as $name => $val) {
            array_push($value, $_POST[htmlspecialchars($name)]);
            array_push($row, htmlspecialchars($name));
        }
        // print_r($data->create($table, $row, $value));
        $data->create($table, $row, $value, $redirect);
    }
}
