<?php

// complete code for controllers/admin/login.php

// new code: include the new class definition
include_once "models/Admin_Table.class.php";

$loginFormSubmitted = isset ( $_POST ['log-in'] );

if ($loginFormSubmitted) {
	
	// code changes start here: comment out the existing login call
	// $admin->login ();
	
	// grab submitted credentials
	$email = $_POST ['email'];
	$password = $_POST ['password'];
	
	// create an object for communicating with the database table
	$adminTable = new Admin_Table ( $db );
	
	try {
		
		// try to login user
		$adminTable->checkCredentials ( $email, $password );
		$admin->login ();
	} catch ( Exception $e ) {
		$adminFormMessage = $e->getMessage ();
	}
}

// new code below
$loggingOut = isset ( $_POST ['logout'] );

if ($loggingOut) {
	$admin->logout ();
}

if ($admin->isLoggedIn ()) {
	$view = include_once "views/admin/logout-form-html.php";
} else {
	$view = include_once "views/admin/login-form-html.php";
}

// $view = include_once "views/admin/login-form-html.php";

return $view;