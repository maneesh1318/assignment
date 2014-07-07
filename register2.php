<?php
//echo 'a';

include 'connect.php';
//echo "hi";
$uname=$_POST["uname"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$passwd=$_POST["passwd"];
$mob=$_POST["mob"];
//$cat=$_POST["cat"];
$gen=$_POST["gen"];
//echo $uname;

$sql= "INSERT INTO user (`username` ,`first_name` ,`last_name` ,`gender` ,`passwd` ,`email` ,`mobile` ,`points`)VALUES ('".$uname."', '".$fname."', '".$lname."','".$gen."', '".$passwd."', '".$email."','".$mob."',0)";
//echo $sql;

if(mysqli_query($con,$sql)){
	echo 1;
}
else{
	echo 0;
}

//"uname="+uname+"&fname="+fname+"&lname="+lname+"&email="+email+"&passwd="+passwd+"&mobileno="+mobileno+"&gen="+gen+"&cat="+cat;
?>
