<?php
	require_once('con1.php');



	$sql = "SELECT * FROM `foods`";
	$r = mysqli_query($con,$sql);
    $count = mysqli_num_rows($r);
    $result = array();
    if ($count>0)
    {
 while($row = mysqli_fetch_array($r))
 {
$name=$row['name'];
$price=$row['price'];
$quantity_remaining=$row['quantity_remaining'];

if($quantity_remaining<1)
{


	array_push($result,array(
	"name"=>$name,
	"quantity_remaining"=>$quantity_remaining,
	"success"=>"1",
	"price"=>$price,
	"contents"=>$row['contents'],
	"image"=>$row['image'],
	"category"=>$row['category'],
	"qntytype"=>$row['qntytype']

	));

}
else
{


array_push($result,array(
"name"=>$name,
"quantity_remaining"=>$quantity_remaining,
"success"=>"1",
"price"=>$price,
"contents"=>$row['contents'],
"image"=>$row['image'],
"category"=>$row['category'],
"qntytype"=>$row['qntytype']
));

}
}
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
