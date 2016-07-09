<?php

// Check image if real or fake image
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["picture"]) && isset($_SESSION['user']) ) {


echo "user";

	
	$target_dir = "uploads/"; /* variable declaration */
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// get image size
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>