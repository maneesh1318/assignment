<html>
<head>
<title>ProbSol</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
<script>
function loadXMLDoc(file,id)
{
//alert("Hi");
/*if(file=='login.php' && document.getElementById('id_login').innerHTML=='Logout'){
	document.getElementById('id_login').innerHTML=='Login';
}
login_check();*/
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(id).innerHTML=xmlhttp.responseText;
	if(file=="talk.php"){
		//alert(document.getElementById(id).innerHTML);
		//eval(document.getElementById(id).innerHTML);
		FB.XFBML.parse();
	}
	//$("#xyz").load("user_name_at_top.php");
    }
}
xmlhttp.open("GET",file,true);
xmlhttp.send();
}

function login()
{
	//alert("Hi");
	document.getElementById("err_msg_1").innerHTML="";
	document.getElementById("err_msg_2").innerHTML="";
	var uname=document.getElementById("id_username").value;
	var passwd=document.getElementById("id_password").value;
    //alert(uname);
	 
	if(uname.length<6){
		document.getElementById("err_msg_1").innerHTML="User Name Invalid. Must be atleast 5 character long";
		return;
	}
	if(passwd.length<6){
		document.getElementById("err_msg_2").innerHTML="Password must me 6 charater long";
		return;
	}
	var filter = /^[a-zA-Z0-9]+$/;
	if (!filter.test(uname)) {
		document.getElementById("err_msg_1").innerHTML="User Name must contain only characters and numbers";
		return;
	}
	if (!filter.test(passwd)) {
		document.getElementById("err_msg_2").innerHTML="Password must contain only characters and numbers";
		return;
	}
	$.post("login2.php",
	{
    uname:uname,
	passwd:passwd,
	},
	function(data,status){
		//alert(data);
		if(data==1){
		    alert("Logged In");
			loadXMLDoc('login.php','main_content');
		}
		else{
			alert("Login Failed");
		}
	});
	
}
function register()
{
	document.getElementById("r_err_msg_2").innerHTML="";
	document.getElementById("r_err_msg_3").innerHTML="";
	document.getElementById("r_err_msg_4").innerHTML="";
	document.getElementById("r_err_msg_5").innerHTML="";
	document.getElementById("r_err_msg_6").innerHTML="";
	document.getElementById("r_err_msg_7").innerHTML="";
	document.getElementById("r_err_msg_8").innerHTML="";
	var uname=document.getElementById("r_input_1").value;
	var fname=document.getElementById("r_input_2").value;
	var lname=document.getElementById("r_input_3").value;
	var passwd=document.getElementById("r_input_4").value;
	var cpasswd=document.getElementById("r_input_5").value;
	var email=document.getElementById("r_input_6").value;
	var mob=document.getElementById("r_input_7").value;
	var filter = /^[a-zA-Z]+$/;
	if(fname.length==0){
		document.getElementById("r_err_msg_2").innerHTML="Invalid Name";
		return;
	}
	if (!filter.test(fname)) {
		//alert("First Name Invalid");
		document.getElementById("r_err_msg_2").innerHTML="Invalid Name";
		return;
	}
	if(lname.length==0){
		document.getElementById("r_err_msg_3").innerHTML="Invalid Name";
		return;
	}
	if (!filter.test(lname)) {
		document.getElementById("r_err_msg_3").innerHTML="Invalid Name";
		return;
	}
	if(!(document.getElementById("r1").checked||(document.getElementById("r2").checked))){
		document.getElementById("r_err_msg_4").innerHTML="Select Gender";
		return;
	}
	if(document.getElementById("r1").checked){
		var gen="Male";
	}
	else{
		var gen="Female";
	}
	if(passwd.length<6){
		document.getElementById("r_err_msg_5").innerHTML="Password Must 6 Character long";
		return;
	}
	var filter = /^[a-zA-Z0-9]+$/;
	if (!filter.test(passwd)) {
		document.getElementById("r_err_msg_5").innerHTML="Password must contain only characters and numbers";
		return;
	}
	if(passwd!=cpasswd){
		document.getElementById("r_err_msg_5").innerHTML="Password and Confirm password not equal";
		return;
		
	}
	var pattern = new RegExp(/[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	if(!pattern.test(email)){
		document.getElementById("r_err_msg_7").innerHTML="Invalid Email";
		return;
	}
	var filter2 = /^[0-9]+$/;
	if (!filter2.test(mob)) {
		document.getElementById("r_err_msg_8").innerHTML="Invalid Mobile No";
		return;
	}
	if(mob.length!=10){
		document.getElementById("r_err_msg_8").innerHTML="Invalid Mobile No";
		return;
	}
	$.post("register2.php",
	{
    uname:uname,
	fname:fname,
	lname:lname,
	passwd:passwd,
	gen:gen,
	email:email,
	mob:mob,
	},
	function(data,status){
		//alert(status);
		if(data==1){
		    alert("Registered");
			loadXMLDoc('login.php','main_content');
		}
		else{
			alert("Not Registered");
			loadXMLDoc('register.php','main_content');
		}
	});
	
}
function user_name_avail()
{
	//alert('Hi');
	document.getElementById("r_err_msg_1").innerHTML="";
	var uname=document.getElementById("r_input_1").value;
	if(uname.length<6){
		document.getElementById("r_err_msg_1").innerHTML="User Name Invalid.<br/> Must be atleast 5 character long";
		return 0;
	}
	var filter = /^[a-zA-Z0-9]+$/;
	if (!filter.test(uname)) {
		document.getElementById("r_err_msg_1").innerHTML="User Name must contain<br/> only characters and numbers";
		return 0;
	}
	$.post("user_name_availability.php",
	{
    uname:uname,
	},
	function(data,status){
		//alert(data);
		if(data==1){
		    //alert("Available");
			//return 1;
			document.getElementById("r_err_msg_1").innerHTML="Available";
			document.getElementById("reg_Btn").disabled=false;
		}
		else{
			//alert("Not Available");
			//return 0;
			document.getElementById("r_err_msg_1").innerHTML="Not Available";
			document.getElementById("reg_Btn").disabled=true;
		}
	});
}

function logout()
{
	var t=1;
	$.post("logout.php",
	{
    t:t,
	},
	function(data,status){
		//alert(data);
		if(data==1){
		    loadXMLDoc('login.php','main_content');
		}
		else{
			//alert("Not Logged In");
		}
	});
}
function post_comment()
{
	var p=document.getElementById("textbox").value;
	//alert(p);
	if(p.length==0){
		//alert(t1.length);
		return;
	}
	$.post("post_problem2.php",
	{
    p:p,
    },
	function(data,status){
		//alert(status);
		loadXMLDoc('post_problem.php','main_content');
	});
}

function solve(probid)
{
	//alert(probid);
	$.post("solution.php",
	{
    probid:probid,
    },
	function(data,status){
		//alert(status);
		document.getElementById('main_content').innerHTML=data;
	});
}

</script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginheight="0" marginwidth="0" bgcolor="#FFFFFF" onload="loadXMLDoc('login.php','main_content')">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div align="center">
  <center>
  <table border="0" width="90%" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50%"><img border="0" src="img/topleft.jpg" width="372" height="106"></td>
    </center>
    <td width="50%">
      <p align="right"><img border="0" src="img/logo.jpg" width="217" height="64"></td>
  </tr>
  </table>
</div>
<div align="center">
  <center>
  <table border="0" width="90%" cellspacing="0" cellpadding="0" background="img/bluebar.jpg">
    <tr>
      <td width="100%"><font size="1">&nbsp;</font></td>
    </tr>
  </table>
  </center>
</div>
<div align="center">
  <center>
  <table border="0" width="90%" cellspacing="0" cellpadding="0">
    <tr>
      <td width="99%" valign="top"><br>
        <div id="main_content">
		
		</div>
    <td width="1%" valign="top">
      <p align="right"><img border="0" src="img/but-top.jpg" width="136" height="22"><br>
      <a  href="#" onclick="loadXMLDoc('login.php','main_content')"><img border="0" src="img/button1.jpg" width="136" height="43"></a><br>
      <a  href="#" onclick="loadXMLDoc('login.php','main_content')"><img border="0" src="img/button2.jpg" width="136" height="50"></a><br>
      <a  href="#" onclick="logout()"><img border="0" src="img/button3.jpg" width="136" height="49"></a><br>
      <a  href="#" onclick="loadXMLDoc('talk.php','main_content')"><img border="0" src="img/button4.jpg" width="136" height="52"></a><br>
      <img border="0" src="img/butbot.jpg" width="136" height="40"></td>
  </tr>
  </table>
</div>
<div align="center">
  <center>
  <table border="0" width="90%" cellspacing="0" cellpadding="0" background="img/bluebar.jpg">
    <tr>
      <td width="100%"><font size="1">&nbsp;</font></td>
    </tr>
	
  </table>
  </center>
  <table border="0">
	<tr>
      <td width="33%"><div class="fb-like" data-href="https://www.facebook.com/Probsoll" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div></td>
	  <td width="33%"><a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></td>
	  <td width="34%"><div class="g-plusone" data-annotation="none" data-href="http://probsol.webuda.com"></div>
		<script type="text/javascript">
	(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
	</script>
	  
	  </td>
    </tr>
	<tr>
	<!--<td><div class="fb-comments" data-href="http://localhost" data-numposts="5" data-colorscheme="light"></div></td>-->
	</tr>
  </table>
</div>

</body>

</html>
