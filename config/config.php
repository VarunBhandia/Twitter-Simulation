
<?php 
ini_set("display_errors",'off');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "twitter";

//    $servername = "localhost";
//    $username = "id4848840_varunbhandia";
//    $password = "varunbhandia";
//    $dbname = "id4848840_varuncec";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) 
      {
          die("Connection failed: " . mysqli_connect_error());
      }
?>