<?php
session_start();
//include 'dbconnect.php';
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

if ($pdo->query($sql) === TRUE) {
  //echo "New record created successfully";
  header('Location: index.php?page=login');
  exit;
} else {
  echo "Error: " . $sql . "<br>";
}

?>
