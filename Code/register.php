<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8"/>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title>ΑΓΓΕΛΙΕΣ ΤΟΥΡΙΣΤΙΚΩΝ ΚΑΤΑΛΥΜΑΤΩΝ </title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
<body>
   <div id="top-nav">
	<a href="index.html">HOME</a>
	<a href="about.html">ABOUT</a>
	<a href="contactform.html">CONTACT</a>
	<a href="register.html">REGISTER</a>

	</div>	

	<div id="header">
	<h1><a href="index.html">Τουρισμός - Καταλύματα</h1></a>
	</div>
	
<?php
	
function NewUser($mysqli)
{
	$NAME = $_POST['name'];
	$USERNAME = $_POST['user'];
	$EMAIL = $_POST['email'];
	$PASSWORD =  $_POST['password'];
	$query = "INSERT INTO USERS (NAME,USERNAME,EMAIL,PASSWORD) VALUES ('$NAME','$USERNAME','$EMAIL','$PASSWORD')";
	$data = mysqli_query ($mysqli,$query)or die(mysql_error());
	if($data)
	{
	echo "YOUR REGISTRATION HAS BEEN COMPLETED... click <a href=http://ellaksrv.datacenter.uoc.gr/~user320/myproject/inputform.html>here</a>";
	}
}

function SignUp()
{
	if(empty($_POST['user']))   //checking the 'user' name which is from register.html, is it empty or have some text
		die("please enter the desired username");
	if (strcmp($_POST ["password"],$_POST ["cpassword"]) !== 0 ) {
		die("please enter the same password in the password fields");
	}
	if (strcmp($_POST ['email'],"") == 0 ) {
		die("please enter your email");
	}
	if (strcmp($_POST ["password"],"") == 0 ) {
		die("please enter your password");
	}
	require "connect.php";
	$mysqli=DBconnect();
	$query = $mysqli->query("SELECT * FROM USERS WHERE USERNAME = '$_POST[user]' AND PASSWORD = '$_POST[password]'") or die(mysql_error());
	if(!$row = mysqli_fetch_array($query) or die(mysql_error()))
	{
		NewUser($mysqli);
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY A REGISTERED USER...";
	}
}
	SignUp();
?>

 </body>
 </html>