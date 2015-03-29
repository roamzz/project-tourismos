<?php
	function DBconnect()
	{
		$conn=new mysqli("localhost", "user320", "afJighcy", "user320_db2");
		if (!$conn)	//check connection
		{
			printf("<span style='font-size:8.0pt;font-family:\"Comic Sans MS\"'><p>Connect failed: %s</p></span>",mysqli_connect_error());
			exit();
		}
		/* STEP 2. - Change character set to utf8 */
		if (!mysqli_set_charset($conn, "utf8")){
			echo "Error loading character set utf8<br>";
		}
		return $conn;
	}
?>