<?php

include('dbconnect.php');
require('dbconnect.php');

$id = $_GET['id'];
$sql ="DELETE FROM `foods` WHERE `id` = '$id'";
if(mysqli_query($con, $sql))
{
  echo  "Food deleted!";
}
else {
  echo "Food deletion failed.";
}

?>
