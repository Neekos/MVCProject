<?php
 		if ($error != "") {
 			echo $error.'<br/>';
 		}
?>
 		<div class="container">
 			<div class="row">
 				<div class="forma">
 					<form action="login" method="post">
 						<hr>
			 	 		UserName:<input type="text" name="username" value="<?php echo $username; ?>"><br/>
			 	 		<hr>
			 	 		Password: <input type="password" name="password" value="<?php echo $password; ?>"><br/>
			 	 		<hr>
			 	 		<input type="submit" name="submit-login" value="login">
			 	 		<hr>
		 			</form>
 				</div>
 			</div>
 		</div>