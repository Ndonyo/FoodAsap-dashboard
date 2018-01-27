<?php
	require_once('con1.php');
	$sql = "SELECT * FROM `chats` ORDER BY `chats`.`timestamp` DESC";

	  $r = mysqli_query($con,$sql);
    $count = mysqli_num_rows($r);
    $result = array();
    if ($count>0)
    {

 while($row = mysqli_fetch_array($r))
 {

       array_push($result,array(

    "sno"=>$row['sno'],
    "userid"=>$row['userid'],
    "device_id"=>$row['device_id'],
    "timestamp"=>$row['timestamp'],
    "success"=>1));
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
