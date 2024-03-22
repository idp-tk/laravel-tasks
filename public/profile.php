<?php
// We need to use sessions, so you should always start sessions using the below code.
//session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
include 'dbconnect.php';
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<?=template_header_loggedin('Profile')?>

<div class="products content-wrapper">
<div class="profile-section">
		<h2>Profile Details</h2>
		<div>
			<table>
				<tr>
					<td>Username:</td>
					<td><?=htmlspecialchars($_SESSION['name'], ENT_QUOTES)?></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><?=htmlspecialchars($password, ENT_QUOTES)?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?=htmlspecialchars($email, ENT_QUOTES)?></td>
				</tr>
			</table>
		</div>
</div>
<?=template_footer()?>