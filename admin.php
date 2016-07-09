<?php

	//Declare variable
	$display = '';

	// Connect DB
	include 'dbconnect.php';
	
	// Insert users in DB
	include 'insertdb.php';

	// File uploads
	include 'uploadimage.php';

	// Register User
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['signup'])) {
	
		    
		// Record inserted into database
		if(insert_db() == 'Yes'){
			$GLOBALS['display'] = "Account verification pending ";
		}
		else{$GLOBALS['display'] = "Error ";}
	}

	// User Login
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['signin'])) {
	    
		// Check for login
		$row = login();


		if($row != 'No'){ 
			//REDIRECT TO DASHBOARD

			if(($row["status"] == 'Denied') ||  ($row["status"] =='Pending')){

				// Redirect to homepage
				
				?>
				
				<script>window.location.replace('index.php?status=<?php echo $row["status"]; ?>');</script>
				
				<?php
			}


			if($row["status"] == 'Approved'){ $GLOBALS['display'] = "Your account has been verified"; 
				// Start Session
				session_start();

				// Instantiate user data from DB
				$_SESSION['user'] = $row;		
			}

		}
		// Redirect to homepage if user login is invalid
		else{ ?>
		
		<script>window.location.replace('index.php?status=Invalid');</script>
		
		<?php

		}
	}



	// confirmation email
	function admin_confirmation_mail( $email, $firstName, $lastName ){

		// Site URL
		$site_url = $GLOBALS['site_url'];

		// Set content-type
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		//header for email
		$headers .= 'From: <admin@appleimages.com>' . "\r\n";			

		/// $email, $admin_decision
		$msg = "Admin,<br>A user with the name $firstName $lastName with email address ($email) 
		needs an account confirmation, 
		\nClick the link to confirm your mail\n 
		<a href=\"$site_url/admin.php?email=$email&admin_decision=Approved\"> Confirm </a> or 
		<a href=\"$site_url/admin.php?email=$email&admin_decision=Denied\"> Deny</a>";


		// send email
		mail('aakaeze3261@conestogac.on.ca',"User Account Pending Confirmation",$msg,$headers);
	}



if (isset($_GET['status'])){



	$status = $_GET['status'];

	switch ($status) {
	    case "Denied":
	        $GLOBALS['display'] = "Access denied";
	        break;
	    case "Pending":
	        $GLOBALS['display'] = "Approval pending";
	        break;
	    case "Invalid":
	        $GLOBALS['display'] = "Invalid username or password";
	        break;
	    default:
	        $GLOBALS['display'] = "Session Expired";
	    break;
	}
}

?>

