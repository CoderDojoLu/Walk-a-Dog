<?php
  error_reporting(-1);
  ini_set('display_errors', 'On');
  set_error_handler("var_dump");
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

  require_once "Mail.php";

  $from = '<' + $useremail + '>';
  $to = '<irneha@hotmail.com>'; // Fixed address (test)
  $subject = 'I would like to walk your dog!';
  $body = "" + $message + "";

  $headers = array(
      'From' => $from,
      'To' => $to,
      'Subject' => $subject
  );

  $smtp = Mail::factory('smtp', array(
          'host' => 'ssl://mail.mbox.lu',
          'port' => '465',
          'auth' => true,
          'username' => 'relay@pick-a-poop.dog',
          'password' => '7erShIeStIon'
      ));

  // Send the mail
  $mail = $smtp->send($to, $headers, $body);

  echo 'Email sent';

  $conn->close();

?>