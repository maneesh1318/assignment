<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['user'])){

echo "ProbSol is a place to solve all your programming related problems. You can also get rewards for solving problems.
<br />To begin:
<br/><br/>
<table border=\"0\">
<th align=\"center\"><b>Login</b></th>
<tr>
<td>Username:</td>
<td><input type=\"text\" id=\"id_username\"/></td>
</tr>
<tr><td></td><td id=\"err_msg_1\"></td></tr>
<tr>
<td>Password:</td>
<td><input type=\"password\" id=\"id_password\"/></td>
<tr><td></td><td id=\"err_msg_2\"></td></tr>
</tr><td></td><td><button onclick=\"login()\">Login</button></td></tr>
<tr><td></td><td>If not registered till now <br /><b onclick=\"loadXMLDoc('register.php','main_content')\"><a href=\"#\">click here</a></b> to register</td></tr>
</table>";
}
else{
$uname=$_SESSION['user'];
$first_name=$_SESSION['first_name'];
$last_name=$_SESSION['last_name'];
$sql = "SELECT points FROM user WHERE username='".$uname."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$points=$row[0];
echo "<h2>Welcome ".$first_name." ".$last_name."</h2>";
echo "<h3>Your Points: ".$points."</h3>";
echo "<h3>Earned Money: ".$points." $</h3>";
echo "<a href=\"#\" onclick=\"loadXMLDoc('browse_problem.php','main_content')\">Earn Money:Solve Problems</a>"."<br/><br/>"."<a href=\"#\"\ onclick=\"loadXMLDoc('post_problem.php','main_content')\">Need Help:Post a Problem</a>";
}
?>
