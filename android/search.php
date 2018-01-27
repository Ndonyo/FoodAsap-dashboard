<?php
include('con.php');
$seaarch_string =$_POST['search_string'];
	
 $sql="select * from patient_details where username like '%".$seaarch_string."%'";
	$r = mysqli_query($con,$sql);
    $count = mysqli_num_rows($r);
    $result = array();
    if ($count>0)
    {
 while($row = mysqli_fetch_array($r))
 {
$username=$row['username'];
$patient=$row['patient'];
$county=$row['county'];	
$phonenumber=$row['phonenumber'];


   array_push($result,array(
"username"=>$username,
"patient"=>$patient,
"county"=>$county,
"phonenumber"=>$phonenumber,
"success"=>"1"
			
		));
}
  echo json_encode(array('result'=>$result));
    
    }
    else 
{
 array_push($result,array(
"success"=>"0",			
		));
	echo json_encode(array('result'=>$result));
}

?>
