<?=template_header('Login')?>

<div class="login">
			<h1>Login</h1>
			<form action="index.php?page=authenticate" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
			<p class="lower-text">Don't have an account? <a href="index.php?page=signup">Sign up</a></p>
		</div>

<?=template_footer()?>