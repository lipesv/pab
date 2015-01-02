<?php

if (isset ( $adminFormMessage ) === false) {
	$adminFormMessage = "";
}

// complete code for views/admin/login-form-html.php
return "<form method='post' action='admin.php' id='login'>
			<p>Login to access restricted area</p>
			<label>e-mail</label>
			<input type='email' name='email' required />
			<label>password</label>
			<input type='password' name='password' required />
			<input type='submit' value='login' name='log-in' />
			<p id='admin-form-message'>$adminFormMessage</p>
		</form>";