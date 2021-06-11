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
            
        }
    }

    // class route{
    //     function go($destination, $file){ 
    //         echo "<script>location='$destination';</script>";
    //     }
    // }
?>