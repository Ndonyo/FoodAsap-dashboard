<?php
	require_once('con1.php');

$sname=			$_POST['name'];
$email=			$_POST['email'];
$password=		$_POST['password'];
$phone=		$_POST['phone_number'];
$loc=		$_POST['location'];
$sql="INSERT INTO `user_details` (`name`,`email`, `password`) VALUES ('$sname','$email', '$password')";
$sql= "INSERT INTO `user_details` (`name`, `email`, `password`, `phone`, `location`) VALUES ('$sname','$email', '$password', '$phone', '$loc');";
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
