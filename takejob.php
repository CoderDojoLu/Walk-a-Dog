<?php
	header('Access-Control-Allow-Origin: *');

	$server = "localhost";
	$usr = "wad";
	$pass = "wad11";
	$db = "wad";

	$conn = new mysqli($server, $usr, $pass, $db);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$message = $_POST["message"];
  $useremail = $_POST["email"];

  $uid = $_POST["uid"];

	$email = "SELECT email from dogs where id='$uid';";

  $result = $conn->query($email);

  mail($email, $useremail . "would like to walk your dog!", $message);

  $conn->close();

?>