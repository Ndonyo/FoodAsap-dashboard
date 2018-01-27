<?php

include('con1.php');
$contents='[{"id":"8","food_name":"Chapati","quantity":"1","final_amt":"10","date_time":"Nov-08-2017 09:55:25 AM"},{"id":"0","food_name":"Good food for the body","quantity":"2","final_amt":"300","date_time":"Nov-08-2017 11:27:34 AM"},{"id":"1","food_name":"Good food for the body","quantity":"2","final_amt":"300","date_time":"Nov-08-2017 11:27:37 AM"}]';
//echo $contents;

$obj = json_decode($contents, TRUE);

for($i=0; $i<sizeof($obj); $i++)
{
  $food_name=$obj[$i]['food_name'];
  $quantity=$obj[$i]['quantity'];
  $sql="select * from `foods` where `name` = '$food_name' ";
  $r = mysqli_query($con,$sql);
    $count = mysqli_num_rows($r);
    $result = array();

 while($row = mysqli_fetch_array($r))
 {
$name=$row['name'];
$price=$row['price'];
$quantity_remaining=$row['quantity_remaining'];
}






$fin=$quantity_remaining-$quantity;
$sql2="UPDATE `foods` SET `quantity_remaining` = '$fin' WHERE `name` = '$food_name'";
if(mysqli_query($con,$sql2))
{
  //echo 1;
}
else
{
//  echo 0;
}

}

 ?>
