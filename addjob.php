<?php
	header('Access-Control-Allow-Origin: *');

	class returnValue {
		var $boolean;
		var $message;
	}

	$server = "localhost";
	$usr = "wad";
	$pass = "wad11";
	$db = "wad";

	$conn = new mysqli($server, $usr, $pass, $db);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$image = $_FILES["image"];
	$email = $_POST["email"];
	$description = $_POST["description"];
	$location = $_POST["location"];
	$payment = $_POST["payment"];
	$uniqid = uniqid();
	$targetPath = "upload/".$_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath);

	$sql = "INSERT INTO dogs (id, image, description, email, payment, location) VALUES ('$uniqid', '$targetPath', '$description', '$email', '$payment', '$location')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>
