<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user'])){
	$uname=$_SESSION['user'];
}
else{
	$uname="Guest";
}
$p=$_POST["p"];

$sql = "INSERT INTO problem(`probid`, `username`, `statement`) VALUES (NULL, '".$uname."', '".$p."');";
$res=mysqli_query($con,$sql);
?>
