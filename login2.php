<?php
session_start();
include 'connect.php';
$uname=$_POST["uname"];
$passwd=$_POST["passwd"];
$sql="SELECT * FROM user WHERE username = '".$uname."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$a=$row['passwd'];
//$cat=$row['category'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
if($passwd==$a){
	//session_start();
	$_SESSION['user']=$uname;
	//$_SESSION['category']=$cat;
	$_SESSION['first_name']=$first_name;
	$_SESSION['last_name']=$last_name;
	echo 1;
}
else{
	echo 0;
}

?>
