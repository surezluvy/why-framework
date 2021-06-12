<?php 
    class main{
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

        function all($table, $query = ""){
            $data = mysqli_query($this->connect, "SELECT * FROM $table $query");
            while($row = mysqli_fetch_array($data)){
                $result[] = $row;
            }
            return $result;
        }

        function create($table, $row, $value){
            $combine_row = implode(",",$row);
            $combine_value = "'".implode("','",$value)."'";
            mysqli_query($this->connect, "INSERT INTO $table ($combine_row) VALUES($combine_value)") or die(mysqli_error($this->connect));
            
            header('location: ../main/index.php?page=read');
        }
        
        function delete($table, $id){
            mysqli_query($this->connect, "DELETE FROM $table WHERE id_user='$id'") or die(mysqli_error($this->connect));
            
            header('location: /why-framework/');
        }
        
        function update($table, $row, $value){
            $combine_row = implode(",",$row);
            $combine_value = implode(",",$value);

            $pecah1 = explode(",",$combine_row);
            $pecah2 = explode(",",$combine_value);
            for($i = 0; $i < 2; $i++){
                $result = array();
                array_push($result, $pecah1[$i]);
                array_push($result, $pecah2[$i]);
                $final = implode("='",$result)."'";
                
                mysqli_query($this->connect, "UPDATE $table SET $final WHERE id_user='$_GET[id]'") or die(mysqli_error($this->connect));
            }
            header('location: ../main/index.php?page=read');
        }
    }

    class routes{
        function get($urls, $controllers, $functions){
            $request = $_SERVER['REQUEST_URI'];
            $project_location = "/why-framework";

            $explode_url = explode(" ",$urls);
            $explode_controller = explode(" ",$controllers);
            $explode_function = explode(" ",$functions);

            for($i = 0; $i < count($explode_url); $i++){

                $combine_url = $project_location.$explode_url[$i];
                $combine_controller = $explode_controller[$i];
                $combine_function = $explode_function[$i];
                
                $url = $combine_url;
                $controller = "controller/".$combine_controller.".php";
                $function = $combine_function;

                if($request == $combine_url){
                    require_once($controller);
                    $function($url[$i]);
                }
            }
            
            // $project_location = "/why-framework";

            // $explode_url = explode(" ",$url);
            // $explode_file = explode(" ",$file);

            // for($i = 0; $i < count($explode_url); $i++){
            //     $combine_url = $project_location.$explode_url[$i];
            //     $combine_file = $explode_file[$i];
            //     if($request == $combine_url){
            //         require $combine_file;
            //     }
            // }
            
            // switch ($request) {
            //     case $project.'/' :
            //         require "main/read.php";
            //         break;
            //     case $project.'/create' :
            //         require "main/create.php";
            //         break;
            //     case $project.'/edit?id='.$id=$_GET['id'] :
            //         require "main/edit_user.php";
            //         break;
            //     default:
            //         http_response_code(404);
            //         echo "404";
            //         break;
            // }
            // echo $request;
        }
    }
    
