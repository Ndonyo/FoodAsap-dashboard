<?php
$send=1;
$number=$_POST["number"];
$ammount=$_POST["ammount"];
if ($send=1)
{

require_once('mpesa/config/Constant.php');
require_once('mpesa/lib/MpesaAPI.php');
$number="254726442087";
$ammount=10;

//added by jjmomanyis
$PAYBILL_NO = "898998";
$MERCHENTS_ID = $PAYBILL_NO;
function generateRandomString() {
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$MERCHANT_TRANSACTION_ID = generateRandomString();

//Get the server address for callback
$host=gethostname();
$ip = gethostbyname($host);

//$Password=Constant::generateHash();
$Password='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';
$mpesaclient=new MpesaAPI;

/**
 * Make payment
 */

$action=1;
if($action=1)
{
$mpesaclient->processCheckOutRequest($Password,$MERCHENTS_ID,$MERCHANT_TRANSACTION_ID,"Charity Organization",$ammount,$number,$ip);
}

else
{

	echo json_encode("No operation selected");
}



}else{
   echo json_encode("No data sent here meen");
}


?>
