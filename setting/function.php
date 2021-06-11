<?php 
    class crud{
        var $host = "localhost";
        var $username = "root";
        var $password = "";
        var $database = "why";
        var $connect = "";

        function __construct()
        {
            $this->connect = new mysqli("$this->host", "$this->username", "$this->password", "$this->database");
        }

        function read($table, $query = ""){
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
            
            header('location: ../main/index.php?page=read');
        }
        
        function edit_user($table, $row, $value){
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

    // class route{
    //     function go($destination, $file){ 
    //         echo "<script>location='$destination';</script>";
    //     }
    // }
?>