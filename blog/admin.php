<?php

// complete code for blog/admin.php
error_reporting ( E_ALL );
ini_set ( "display_errors", 1 );

include_once 'models/Page_Data.class.php';

$pageData = new Page_Data ();
$pageData->title = "PHP/MySQL blog demo";
$pageData->addCSS ( "css/blog.css" );
$pageData->addScript ( "js/editor.js" );

// code changes start here: comment out navigation
// $pageData->content = include_once 'views/admin/admin-navigation.php';

$dbInfo = "mysql:host=localhost;dbname=simple_blog";
$dbUser = "root";
$dbPassword = "Tu_)(Le#123!";

$db = new PDO ( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

// code changes here: comment out some of the existing code in admin.php
// $navigationIsClicked = isset ( $_GET ['page'] );

// if ($navigationIsClicked) {
// $contrl = $_GET ['page'];
// } else {
// $contrl = "entries";
// }

// new code added below
include_once 'models/Admin_User.class.php';
$admin = new Admin_User ();

$pageData->content = include_once "controllers/admin/login.php";

if ($admin->isLoggedIn ()) {
	
	$pageData->content .= include "views/admin/admin-navigation.php";
	
	$navigationIsClicked = isset ( $_GET ['page'] );
	
	if ($navigationIsClicked) {
		$controller = $_GET ['page'];
	} else {
		$controller = "entries";
	}
	
	$pathToController = "controllers/admin/$controller.php";
	$pageData->content .= include_once $pathToController;
}

$page = include_once 'views/page.php';

echo $page;	