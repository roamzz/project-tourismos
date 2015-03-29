<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title>Αποτελέσματα Καταλυμάτων </title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<style>
	table {
	background-color:#BEBEBE;
	text-align:center;
	padding: 5px;
	/*width: 50%;*/
	font-family:Roboto,sans-serif;
    font-size: 14px;
    text-overflow: ellipsis;
	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	border: solid 1px rgba(238, 179, 61);
	position:relative;
	left: 2%;
	margin:10px;
	top: 40%;
	}
	

	</style>
</head>

<body>
	<div id="top-nav">
	<a href="index.html">HOME</a>
	<a href="about.html">ABOUT</a>
	<a href="contactform.html">CONTACT</a>
	<a href="register.html">REGISTER</a>
	</div>
	<div id="header">
	<h1><a href="index.html">Φίλτρα Αναζήτησης</h1></a>
<div id="allforms">
<form name="checkbox_form" id= "checkbox_form" method="POST" action="mysqlretrievedata.php">
<label>Τύπος Καταλύματος:</label>
<input type="radio" name="aptype" value="hotel"/>Ξενοδοχείο
<input type="radio" name="aptype" value="rooms"/>Εν.Δωμάτια
<input type="radio" name="aptype" value="apartment"/>Διαμέρισμα
<input type="radio" name="aptype" value="house"/>Μονοκατοικία
<input type ="submit" name="checkbox_search" value="Αναζήτηση">

</form>
<form name="search_form" id= "search_form" method="POST" action="mysqlretrievedata.php">
	<input type="text" name="search_box" placeholder="Αναζήτηση Περιοχής ή ΤΚ"  value="" />
	<input type ="submit" name="search" value="Περιοχή ή Τ.Κ.">

</form>

<form name="filter_form" id="filter_form" method="POST" action="mysqlretrievedata.php">
	<input type="text" name="filter_box" value="" placeholder="Αναζήτηση Περιγραφής" />
	<input type ="submit" name="filter_search" value="Αναζήτηση" title="Αναζήτηση Περιγραφής">

</form>
</div>
</div>	

<?php


require "connect.php";
$conn = DBconnect();
$sql = " SELECT * FROM AGGELIES ";

if (isset($_POST['search'])) {
	$search_term=$_POST['search_box'];
	//$search_term = mysql_real_escape_string($_POST['search_box']);
	//echo $search_term;
	$sql .= "WHERE tk= '".$search_term."' ";
	$sql .= "OR area like '%".$search_term."%' ";
}
if (isset($_POST['filter_search'])) {
	$search_term2=$_POST['filter_box'];
	$sql .= "WHERE COMMENTS like '%".$search_term2."%' ";
	
}

if (isset($_POST['checkbox_search'])) {
	$search_term3=$_POST['aptype'];
	
	//echo $search_term3;
	//echo $sql;
	if (strcmp($search_term3,"hotel" )==0) {
		$sql .= "WHERE ACCOMODATIONTYPE= 'Ξενοδοχείο' ";

	}elseif (strcmp($search_term3,"rooms" )==0) {
		$sql .= "WHERE ACCOMODATIONTYPE= 'Ενοικιαζόμενα Δωμάτια' ";
	}elseif (strcmp($search_term3,"apartment" )==0) {
		$sql .= "WHERE ACCOMODATIONTYPE= 'Διαμέρισμα' ";
	}elseif (strcmp($search_term3,"house" )==0) {
		$sql .= "WHERE ACCOMODATIONTYPE= 'Σπίτι' ";
	}
	
	
}

$sql .= " ORDER BY AREA ASC ";
$result = mysqli_query($conn, $sql) or die (mysql_error());

?>




<br/>
<table width="70%" cellpadding="5" cellspace="5" border='1'>
	<tr>
		<td><strong>ΟΝΟΜΑ</strong></td>
		<td><strong>ΤΥΠΟΣ ΔΩΜΑΤΙΟΥ</strong></td>
		<td><strong>ΠΕΡΙΟΧΗ</strong></td>
		<td><strong>ΔΙΕΥΘΥΝΣΗ</strong></td>
		<td><strong>T.K.</strong></td>
		<td><strong>EMAIL</strong></td>
		<td><strong>ΤΗΛΕΦΩΝΟ</strong></td>
		<td><strong>WEBSITE</strong></td>
		<td><strong>ΤΙΜΗ</strong></td>
		<td><strong>ΗΜΕΡΟΜΗΝΙΑ</strong></td>
		<td><strong>ΠΕΡΙΓΡΑΦΗ</strong></td>
		
	
	</tr>


	
	
<?php while ($row = mysqli_fetch_assoc($result)){?>
<tr>
	
	<td><?php echo $row['NAME']; ?></td>
	<td><?php echo $row['ACCOMODATIONTYPE']; ?></td>	
	<td><?php echo $row['AREA']; ?></td>
	<td><?php echo $row['ADDRESS']; ?></td>	
	<td><?php echo $row['TK']; ?></td>	
	<td><?php echo $row['EMAIL']; ?></td>	
	<td><?php echo $row['TELEPHONE']; ?></td>	
	<td><?php echo $row['WEBSITE']; ?></td>
   	<td><?php echo $row['PRICE']; ?></td>
	<td><?php echo $row['ENTRY_DATE']; ?></td>
	<td><?php echo $row['COMMENTS']; ?></td>


</tr>
<?php } ?>




</body>
</html>