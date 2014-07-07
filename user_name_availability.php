<?php
include 'connect.php';
$q = $_POST['uname'];
//$l=strlen($q);

$sql="SELECT * FROM user WHERE username = '".$q."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$a=$row['username'];
if($a){
	echo 0;
}
else{
	echo  1;
}
mysqli_close($con);
?>
