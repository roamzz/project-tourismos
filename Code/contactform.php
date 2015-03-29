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
	if(strcmp($_POST ["email"],"") == 0 )
		die("please enter your email");
	if(strcmp($_POST ["name"],"") == 0 )
		die("please enter your name");
	require "connect.php";
	$mysqli=DBconnect();

	
		$array=array("insert into `CONTACT` (
			`NAME`,
			`EMAIL`,
			`MESSAGE`
			) values('",
			$_POST ["name"],"','",
			$_POST ["email"],"','",
			$_POST ["message"],"')");
		$query=implode("",$array);
		
			
		$result = mysqli_query($mysqli, $query);
		if($result)
			echo "Ευχαριστούμε που επικοινωνήσατε μαζί μας!";
		else
			die("Connection failed");


?>
 
 </body>
 </html>