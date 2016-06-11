<?php
  error_reporting(-1);
  ini_set('display_errors', 'On');
  set_error_handler("var_dump");
	//header('Access-Control-Allow-Origin: *');

  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
  mail("irneha@hotmail.com", "wad", "mailplease", $headers);
  echo 'Email sent';
/*
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

  echo '<script type="text/javascript">alert(' + $message + ');</script>';
*/

  //$conn->close();

?>