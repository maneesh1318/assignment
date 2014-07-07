<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user'])){
		$uname=$_SESSION['user'];
	//echo "You Are Already Logged In";
}
$sql = "select statement from problem where username='".$uname."' order by probid desc";
$result = mysqli_query($con,$sql);
?>
<table border='0' align="center">
<tr>
<td>Post Here:</td>
</tr>
<tr>
<td>
<textarea id="textbox" name="myTextBox" cols="75" rows="5"></textarea>
</td>
</tr>
<tr>
<td>
<button id="commentBtn" onclick="post_comment()">Post</button></td>
</tr>

<?php

while($row = mysqli_fetch_array($result)) {
	$un=$uname;
	$com=$row['statement'];
	//echo "<tr><td width='20%' align='left'>".$un."</td><td width='80%'>".$com."</td></tr>";
	echo "<tr><td><br/></td></tr><tr bgcolor=\"#E6E6E6\"><td>".$un."</td></tr><tr bgcolor=\"#E6E6E6\"><td>".$com."</td></tr><tr><td><br/></td></tr>";
}
?>
</table>
