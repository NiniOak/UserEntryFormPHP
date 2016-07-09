<?php
	
	$site_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; // Connect to the url

	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "dappacom_barbara";

	// Connect to the db
	$link = mysqli_connect($servername, $username, $password, $dbname);

	/* Check connection */
	if (!$link) {
	    die("Connection failed: " . mysqli_error($link)); //return string of the last error
	}

    /* Close connection */
    mysqli_close( $link)	
?>