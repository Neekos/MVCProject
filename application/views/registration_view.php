<div class="container">
	<div class="row">
		<?php  echo ($error != "")? $error: "" ; ?>
		<form action="registration" method="post">
			<hr>
			UserName: <input type="text" name="username" value="<?php echo $username;?>"><br/>
			Password: <input type="password" name="password" value="<?php echo $password;?>"><br/>
			Password (confirm): <input type="password" name="password-confirm" value="<?php echo $password_confirm;?>"><br/>
			E-mail: <input type="text" name="email" value="<?php echo $email;?>"><br/>
			<hr>
			<input type="submit" name="submit-form" value="Register">
		</form>
		<div class="captcha">
			тут капка
		</div>
	</div>
</div>