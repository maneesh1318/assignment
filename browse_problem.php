<table align="center" border="2">
<tr>
<td width="20%">
Problem ID:
</td>
<td width="40%">
Problem 
</td>
<td width="15%">
Submitted By:
</td>
<td width="15%">
Number of Solution:
</td>
<td width="10%">Solve</td>
</tr>
<?php
session_start();
include 'connect.php';

if(isset($_SESSION['user'])){
		$uname=$_SESSION['user'];
	//echo "You Are Already Logged In";
}
else{
	$uname="Guest";
}
$sql = "select * from problem where username!='".$uname."' order by probid";
$result = mysqli_query($con,$sql);
$bt="<button >Solve</button>";
while($row = mysqli_fetch_array($result)) {
$pid=$row['probid'];
$un=$row['username'];
$st=$row['statement'];
$bt="<button onclick=\"solve(".$pid.")\" >Solve</button>";
$n=0;
echo "<tr><td>".$pid."</td><td>".$st."</td><td>".$un."</td><td>".$n."</td><td>".$bt."</td></tr>";

}

?>
</table>
