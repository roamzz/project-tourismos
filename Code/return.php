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
	<a href="program.html">ABOUT</a>
	<a href="contactform.html">CONTACT</a>
	<a href="register.html">REGISTER</a>

	</div>	

	<div id="header">
	<h1><a href="index.html">Τουρισμός - Καταλύματα</h1></a>
	</div>
<?php
	if(strcmp($_POST ["user"],"") == 0 )
		die("please enter your username");
	if(strcmp($_POST ["password"],"") == 0 )
		die("please enter your password");
	require "connect.php";
	$mysqli=DBconnect();
	$query = $mysqli->query("SELECT * FROM USERS WHERE USERNAME = '$_POST[user]' AND PASSWORD = '$_POST[password]'") or die(mysql_error());
	if(mysqli_fetch_array($query) or die(mysql_error()))
	{
		$array=array("insert into `AGGELIES` (
			`USERNAME`,
			`NAME`,
			`ACCOMODATIONTYPE`,
			`AREA`,
			`ADDRESS`,
			`TK`,
			`EMAIL`,
			`TELEPHONE`,
			`WEBSITE`,
			`PRICE`,
			`ENTRY_DATE`,
			`COMMENTS`) values('",
			$_POST ["user"],"','",
			$_POST ["name"],"','",
			$_POST ["AccomodationType"],"','",
			$_POST ["area"],"','",
			$_POST ["address"],"','",
			$_POST ["tk"],"','",
			$_POST ["email"],"','",
			$_POST ["telephone"],"','",
			$_POST ["website"],"','",
			$_POST ["price"],"','",
			date ('Y-m-d h:m'),"','",
			/*$_POST ["date"],"','",*/
			$_POST ["comments"],"')");
		$query=implode("",$array);
		
		$result = mysqli_query($mysqli, $query);
		//$result = $mysqli->query($query);
		if($result)
			printf("Successfully inserted new add for %s!",$_POST ["user"]);
		else
			die("Connection failed");
	}
	else
		die("No such user or wrong password");
	


?>
<hr>
<h2>Thank you for submitting:<?php echo $_POST ["name"] . "!";  ?> </h2><br/>
<hr>
<p>Είδος Δωματίου: <?php echo $_POST ["AccomodationType"]; ?><br/>
Περιοχή: <?php echo $_POST ["area"]; ?><br/>
Διεύθυνση: <?php echo $_POST ["address"]; ?> <br/>
Τ.Κ.: <?php echo $_POST ["tk"]; ?> <br/>
Email: <?php echo $_POST ["email"]; ?> <br/>
Τηλέφωνο: <?php echo $_POST ["telephone"]; ?> <br/>
Website: <?php echo $_POST ["website"]; ?> <br/>
Τιμή Δωματίου: <?php echo $_POST ["price"]; ?> <br/>
Ημερομηνία: <?php echo $_POST ["date"]; ?> <br/>
Σχόλια: <?php echo $_POST ["comments"]; ?> <br/>
</p>

 <div id="footer">
	   Designed and developed by <a href="mailto:epantopoyloy@gmail.com">Irene Pantopoulou</a>
	
	</div>
 </body>
 </html>