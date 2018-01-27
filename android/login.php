<?php

     $username=$_POST['email'];
     $password=$_POST['password'];
  require_once('con1.php');
	$sql = "SELECT * FROM `user_details` WHERE `email`='$username' and `password`='$password'";
	  $r = mysqli_query($con,$sql);
    $count = mysqli_num_rows($r);
    $result = array();
    if ($count>0)
    {
      while($row = mysqli_fetch_array($r))
      {
        $phone  = $row['phone'];

        $location  = $row['location'];

      }


 array_push($result,array(
"succes"=>"1","phone"=>$phone, "location"=>$location
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
