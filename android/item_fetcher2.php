<?php
	require_once('con1.php');

$customerid="jj@g.com";//$_POST['owner_id'];

	$sql = "SELECT * FROM `slsts` where `uID` ='$customerid'";
	$r = mysqli_query($con,$sql);
    $r = mysqli_query($con1,$sql);
    $count = mysqli_num_rows($r);
    $result = array();


    if ($count>0)
    {
 while($row = mysqli_fetch_array($r)){
$tprice=$row['tprice'];
$date=$row['date'];
$trxID=$row['trxID'];
$uID=$row['uID'];
$contents=$row['contents'];
   array_push($result,array(
"content"=>$contents,
"price"=>$tprice,
"trxID"=>$trxID,
"date"=>$date,
"success"=>1

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
