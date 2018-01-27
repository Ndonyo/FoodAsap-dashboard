<?php

include("con1.php");
$distance=$_POST['distance'];
$event_name=$_POST['event_name'];
$email=$_POST['email'];
$sql="INSERT INTO `event` (`name`, `description`, `ammount`, `kms`, `email`) VALUES ('$name', '', '0', '$distance', '$email');";
if(mysqli_query($con,$sql))
{
$result=array();
array_push($result,array(
			"status"=>"1"
                        
));
echo json_encode(array('result'=>$result));



}
else
{
$result=array();
array_push($result,array(
			"status"=>"0"
                       
));
echo json_encode(array('result'=>$result));
}




?>
