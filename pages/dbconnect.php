<?php


$con = mysqli_connect("localhost", "root", "", "boma") or die("Error " . mysqli_error($con));
$con1 = mysqli_connect("localhost", "root", "", "boma") or die("Error " . mysqli_error($con));
if(!$con)

{
	echo "error";
}
else
{
//echo "connected";
}

?>
