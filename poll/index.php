<?php

error_reporting ( E_ALL );
ini_set ( "display_errors", 1 );

// load model
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data ();
$pageData->title = "PHP/MySQL site poll example";

// new code starts here
// database credentials
$dbInfo = "mysql:host=localhost;dbname=playground";
$dbUser = "root";
$dbPassword = "Tu_)(Le#123!";

try {
	// try to create a database connection with a PDO object
	$db = new PDO ( $dbInfo, $dbUser, $dbPassword );
	$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$pageData->content = "<h1>We're connected</h1>";
} catch ( Exception $e ) {
	$pageData->content = "<h1>Connection failed!</h1><p>$e</p>";
}

//loading poll controller again
$pageData->content = include_once "controllers/poll.php";

$page = include_once 'views/page.php';

echo $page;