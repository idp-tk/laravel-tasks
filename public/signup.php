<?php
session_destroy();
?>
<?=template_header('Sign Up')?>

<div class="login">
			<h1>Sign Up</h1>
			<form action="index.php?page=create" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Sign up">
			</form>
			<p class="lower-text">Already have an account? <a href="index.php?page=login">Log in</a></p>
		</div>

<?=template_footer()?>