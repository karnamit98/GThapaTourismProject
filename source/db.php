<?php
// function OpenCon()
//  {
//  $dbhost = "localhost";
//  $dbuser = "root";
//  $dbpass = "";
//  $db = "rrdb";
//  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
//  return $conn;
//  }
 
// function CloseCon($conn)
//  {
//  $conn -> close();
//  }

    // define('DB_SERVER','localhost');// Your hostname
    // define('DB_USER','root'); // Databse username
    // define('DB_PASS' ,''); // Database Password
    // define('DB_NAME', 'rrdb');// Database name
    // class DB_con
    // {
    //     function __construct()
    //     {
    //         $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    //         $this->dbh=$con;
    //         // Check connection
    //         if (mysqli_connect_errno())
    //         {
    //         echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //         }
    //     }
    // }



class DbConnection{
 
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'rrdb';
 
    protected $connection;
 
    public function __construct(){
 
        if (!isset($this->connection)) {
 
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
 
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
        return $this->connection;
    }
}
?>

   
