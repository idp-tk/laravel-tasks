<?php
$DATABASE_HOST = 'idp-database.mysql.database.azure.com';
$DATABASE_USER = 'idpadmin';
$DATABASE_PASS = 'password112!';
$DATABASE_NAME = 'itemdatabase';

// Try and connect using the info above.
$mysqli->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
$mysqli->ssl_set(NULL, NULL, 'DigiCertGlobalRootCA.crt.pem', NULL, NULL);
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>