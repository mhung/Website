<?php

  $name = $_GET['name'];
  $txt = $_GET['message'];
  //$con=mysqli_connect("localhost","mhung","mhung","chatRoom");

require_once "../includes/db.php";  // The mysql database connection script


$query="INSERT INTO Message VALUES (NULL,'$name','$txt','-')";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);





      
?>