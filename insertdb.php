
application/x-httpd-php db_calls.php ( PHP script text )

<?php
	// Login
	function login(){ 

		$conn 		= $GLOBALS['conn'];
		$email 		= $_REQUEST['email'];
		$password 	= $_REQUEST['password'];
		
		
		//echo $GLOBALS['conn']; exit;
		
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

		$result = mysqli_query($conn, $sql);    //echo 'aaa '.mysqli_num_rows($result);


			if (mysqli_num_rows($result) > 0){ 

			  	// output data of each row
			  	while($row = mysqli_fetch_assoc($result)) {
			  		// return db data
			    	RETURN $row;
			  	}
			}
			else{ return 'No'; }

		mysqli_close($conn);
	}


	// Insert into Database
	function insert_db(){
					
		$conn 		= $GLOBALS['conn'];
		//echo $GLOBALS['conn'];
			
		// Collect value of input field
		$firstName 	= $_REQUEST['firstName'];
		$lastName 	= $_REQUEST['lastName'];
		$email 		= $_REQUEST['email'];
		$password 	= $_REQUEST['password'];



		$sql = "INSERT INTO users (email, password, firstname, lastname)
			VALUES ('$email', '$password', '$firstName', '$lastName' )";


			if (mysqli_query($conn, $sql)) { 

				//Send admin confirmation mail
				admin_confirmation_mail($email, $firstName);

	    		return 'Yes';
			} 
			else {	return 'No';	}

			mysqli_close($conn); 
	}

	// Admin updates user status
	function changeUserStatus($email, $admin_decision){

		$conn = $GLOBALS['conn'];
		
		$sql = "UPDATE users SET status = '$admin_decision'  WHERE email = '$email' ";

		if (mysqli_query($conn, $sql)) {
		    RETURN "Your user account is $admin_decision";
		} else {
		    RETURN "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);

		// Send mail to client
		$message = '<h2>Hi,\nYour account has now been activated </h2> You can now login';

		// Send mail to User on account status change
		$to = $email;		
		$headers = "From: webmaster@example.com";
		mail($to, "Admin Decision on your Account", $message, $headers);

	}





