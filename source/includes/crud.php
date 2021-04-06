<?php
     include_once "db.php";

  
     //include_once('DbConnection.php');
      
     class CrudOperation extends DbConnection{
        public $array = [];
         public function __construct(){
      
             parent::__construct();
         }
      
         public function check_login($username, $password){
      
             $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

             $query = $this->connection->query($sql);
      
             if($query->num_rows > 0){
                 $row = $query->fetch_array();
                 return $row['user_id'];
             }
             else{
                 return false;
             }
         }
      
         public function details($sql){
      
             $query = $this->connection->query($sql);
      
             $row = $query->fetch_array();
      
             return $row;       
         }
      
         public function escape_string($value){
      
             return $this->connection->real_escape_string($value);
         }

         public function register_user($name, $username, $email, $password, $country, $age) {
            $sql = "INSERT INTO users (name, email, username, password, age, country, role, status) VALUES ('$name', '$email', '$username', '$password', '$age', '$country', 0, 0)";
            //$query = $this->connection->query($sql);
            return $this->connection->query($sql);
         }

         public function fetch_data_with_id($table_name, $column_name, $id) {

            $sql = "SELECT * FROM $table_name WHERE $column_name = '$id'";

            $query = $this->connection->query($sql);
            if($query){
                $row = $query->fetch_array();
                return $row;
            }
            else 
            echo "Invalid sql ".$sql;

      
         }


         public function fetch_all_table_data($table_name) {
            $sql = "SELECT * FROM $table_name";
            $query = $this->connection->query($sql);
      
            while($row = mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
     
         }

       

         public function fetch_datas_with_column($table_name, $column_name, $id) {
                $sql = "SELECT * FROM $table_name WHERE $column_name = '$id'";
            $query = $this->connection->query($sql);
      
         
            while($row = mysqli_fetch_assoc($query)){
                $array[] = $row;
            }
            return $array;
         }

     }



     $crud = new CrudOperation;



?>