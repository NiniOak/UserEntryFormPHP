<?php include 'header.php'; ?>
<?php include 'admin.php'; ?>

<?php

if( isset($_GET['email']) && isset($_GET['approval_status']) ){

	$email = $_GET['email'];
	$approval_status = $_GET['approval_status'];

	echo changeUserStatus($email, $approval_status);

	
}
else{

	echo "Try again later";

}
?>

<?php include_once ('footer.php'); exit; ?>