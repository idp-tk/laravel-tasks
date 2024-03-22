<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'lhcp4028.webapps.net';
$DATABASE_USER = 'h75tbc3z_idpadmin';
$DATABASE_PASS = 'terminal998';
$DATABASE_NAME = 'h75tbc3z_itemdatabase';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username, password and email fields!');
}
$salt = "4erbeh35t3tgr34r2tg4t";
$username = $_REQUEST['username'];
$password = crypt($_REQUEST['password'], $salt);
$email = $_REQUEST['email'];

$sql = "INSERT INTO accounts (Username, Password, Email)
VALUES ('$username', '$password', '$email')";

if ($con->query($sql) === TRUE) {
  //echo "New record created successfully";
  header('Location: index.php?page=login');
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
?>
