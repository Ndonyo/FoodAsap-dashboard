<?php
include("con1.php");

$sql="select * from `events` ";


$r = mysqli_query($con,$sql);
	$result = array();
	while($row = mysqli_fetch_array($r)){
		array_push($result,array(
			"title"=>$row['title'],
"description"=>$row['description']
      
		));
	}
	
	echo json_encode(array('result'=>$result));



?>


