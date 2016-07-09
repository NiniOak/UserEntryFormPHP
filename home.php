<?php session_start(); ?>
<?php include 'header.php'; ?>
<?php include 'admin.php'; ?>


<?php 		

	if(!isset($_SESSION['user'])){

		header('Location: index.php?status=expired');
		exit;

		//add'index.php';
	}

    else{
		$row = $_SESSION['user'];
		print_r($row);
	}
?>

<h2>Welcome <?php echo $row['firstname']; ?>,</h2>
<hr />

<form action="home.php" method="post" enctype="multipart/form-data">
    Upload image:
    <input type="hidden" name="photo" value="photo">
    <input type="file" name="uploadimage" id="uploadimage" required>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php include_once ('footer.php'); exit; ?>