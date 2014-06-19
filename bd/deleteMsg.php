<?php
require_once "../includes/db.php"; 

$idMsg = $_GET['id'];
$query="DELETE FROM Message where idMessage=$idMsg";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

# JSON-encode the response
echo $json_response = json_encode($arr);

?>


