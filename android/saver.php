<?php


  require_once('con1.php');

require_once('mpesa/config/Constant.php');
require_once('mpesa/lib/MpesaAPI.php');

$phone_number=	$_POST['phone_number'];
$tprice=	$_POST['price'];
$date=		$_POST['date'];
$trxID=		$_POST['trxID'];
$uid=		$_POST['uid'];
$contents=$_POST['items'];
$location=	$_POST['location'];
$obj = json_decode($contents, TRUE);

// $phone_number = 1*$phone_number;
// echo $phone_number;
// $phone_number = "254".$phone_number;
// echo  "final phone number".$phone_number;


$PAYBILL_NO = "898998";
$MERCHENTS_ID = $PAYBILL_NO;
$MERCHANT_TRANSACTION_ID = generateRandomString();
$host=gethostname();
$ip = gethostbyname($host);
$Password='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';
$mpesaclient=new MpesaAPI;
//$sql="INSERT INTO `payment` (`id`,`phonenumber`, `amount`,`patient`,`caregivername`) VALUES (null,'$number','$ammount','$user','$caregiver')";

$foods = "";

for($i=0; $i<sizeof($obj); $i++)
{
  $food_name=$obj[$i]['food_name'];

  $foods = $foods."<br/>".$food_name;


  $quantity=$obj[$i]['quantity'];
  $sql="select * from `foods` where `name` = '$food_name' ";
  $r = mysqli_query($con1,$sql);
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
if(mysqli_query($con1,$sql2))
{
}
else
{
}

}
//UPDATE `user_details` SET `location` = 'worried' WHERE `user_details`.`email` = 'jj@g.com';
$sql2="UPDATE `user_details` SET `location` = '$location', 'password' ='$phone_number' WHERE `user_details`.`email` = '$uid';";
if(mysqli_query($con1,$sql2))
{

}
$sql="INSERT INTO `slsts` (`tprice`, `date`, `trxID`, `uID`, `contents`, `status`, `time`, `location`) VALUES
 ('$tprice', CURRENT_TIMESTAMP, '$trxID', '$uid', '$foods', 'PENDING', CURRENT_TIMESTAMP, '$location');";
if(mysqli_query($con1,$sql))
{
$result=array();
array_push($result,array(
			"status"=>"1"

));
echo json_encode(array('result'=>$result));
$mpesaclient->processCheckOutRequest($Password,$MERCHENTS_ID,$MERCHANT_TRANSACTION_ID,"Food Asap",'10',$phone_number,$ip);

}
else
{
$result=array();
array_push($result,array(
			"status"=>"0"
));
echo json_encode(array('result'=>$result));
}

function generateRandomString()
{
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
