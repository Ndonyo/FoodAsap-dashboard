<?php 

     $username=$_POST['username'];
     $password=$_POST['password'];
	require_once('con1.php');

	$sql = "SELECT * FROM `participant` WHERE `username`='$username' and `password`='$password'  ";
	$r = mysqli_query($con,$sql);
    $count = mysqli_num_rows($r);
    $result = array();
    if ($count>0)
    {
 array_push($result,array(
"succes"=>"1",			
		));
	echo json_encode(array('result'=>$result));
    
    
    }
    else 
{
 array_push($result,array(
"succes"=>"0",			
		));
	echo json_encode(array('result'=>$result));
}
    
    

?>
