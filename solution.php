<table border="2" align="center">
<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user'])){
	$uname=$_SESSION['user'];
}
else{
	$uname="Guest";
}
$q = $_POST['probid'];
$sql = "SELECT * FROM `problem` WHERE probid='".$q."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$pid=$row['probid'];
$un=$row['username'];
$st=$row['statement'];
echo "<tr><td>Problem By:".$un."</td></tr>";
echo "<tr><td>".$st."</td></tr>";
echo "<tr><td><textarea rows=\"4\" cols=\"120\"></textarea></td></tr>";
echo "<tr><td><button>Post Solution</button></td></tr>";

?>
</table>
