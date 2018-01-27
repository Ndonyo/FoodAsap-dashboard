<?php

$number=$_POST["payer_number"];
$ammount=$_POST["total"];
$caregiver = $_POST['caregiver'];
$user= $_POST['user'];


include('con1.php');
require_once('mpesa/config/Constant.php');
require_once('mpesa/lib/MpesaAPI.php');


$number="254726442087";
$ammount=3;
$PAYBILL_NO = "898998";
$MERCHENTS_ID = $PAYBILL_NO;
$MERCHANT_TRANSACTION_ID = generateRandomString();
$host=gethostname();
$ip = gethostbyname($host);
$Password='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';
$mpesaclient=new MpesaAPI;
$sql="INSERT INTO `payment` (`id`,`phonenumber`, `amount`,`patient`,`caregivername`) VALUES (null,'$number','$ammount','$user','$caregiver')";

if(mysqli_query($con, $sql))
{
echo 1;
$mpesaclient->processCheckOutRequest($Password,$MERCHENTS_ID,$MERCHANT_TRANSACTION_ID,"Eclinic",'10',$number,$ip);
}
else
{
	echo 0;
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
