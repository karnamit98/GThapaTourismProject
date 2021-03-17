<?php
    require_once 'db.php';
    $conn = OpenCon();
    echo "Connected Successfully";


    $sql = "SELECT id, name, email FROM users";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
      }
    } else {
      echo "0 results";
    }


    CloseCon($conn);
?>