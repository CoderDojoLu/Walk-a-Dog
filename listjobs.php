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

	$area = $_POST["area"];


  $dogs = array();
	$sql = "SELECT * from dogs where location='$area';";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $dogs[] = $row;
      }
      echo json_encode($dogs);
  } else {
      echo "0 results";
  }

  $conn->close();

?>
