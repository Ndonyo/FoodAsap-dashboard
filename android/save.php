<?php
include("con.php");

$username= $_POST['username'];
$device_id= $_POST['device_id'];

$sql ="select * from  `chats` WHERE `userid` = '$username' ";
$r =mysqli_query($con, $sql);
$count = mysqli_num_rows($r);
if($count>0)
{
  $sql ="UPDATE `chats` SET `timestamp` =  CURRENT_TIMESTAMP WHERE  `userid` = '$username' ";
  mysqli_query($con, $sql);
}
else
{

$sql ="INSERT INTO `chats` (`sno`, `userid`, `device_id`, `timestamp`) VALUES
                           (NULL, '$username', '$device_id', CURRENT_TIMESTAMP)";
mysqli_query($con, $sql);

}




?>
