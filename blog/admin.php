<?php

// complete code for blog/admin.php
error_reporting ( E_ALL );
ini_set ( "display_errors", 1 );

include_once 'models/Page_Data.class.php';

$pageData = new Page_Data ();
$pageData->title = "PHP/MySQL blog demo";
$pageData->addCSS ( "css/blog.css" );
$pageData->addScript ( "js/editor.js" );

// load navigation
$pageData->content = include_once 'views/admin/admin-navigation.php';

// partial code listing for admin.php
// new code starts here
$dbInfo = "mysql:host=localhost;dbname=simple_blog";
$dbUser = "root";
$dbPassword = "Tu_)(Le#123!";

$db = new PDO ( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
// end of new code – no changes below

// new code begins here
$navigationIsClicked = isset ( $_GET ['page'] );

if ($navigationIsClicked) {
	// prepare to load corresponding controller
	$contrl = $_GET ['page'];
} else {
	// prepare to load default controller
	$contrl = "entries";
}

// load the controller
$pageData->content .= include_once "controllers/admin/$contrl.php";
// end of new code

// no changes below
$page = include_once 'views/page.php';
echo $page;	