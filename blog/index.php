<?php

// complete code for index.php
error_reporting ( E_ALL );
ini_set ( "display_error", 1 );

include_once 'models/Page_Data.class.php';
$pageData = new Page_Data ();
$pageData->title = "PHP/MySQL blog demo example";
$pageData->addCSS ( "css/blog.css" );

$dbInfo = "mysql:host=localhost;dbname=simple_blog";
$dbUser = "root";
$dbPassword = "Tu_)(Le#123!";

$db = new PDO ( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

// changes begin here
// comment out initial test message
// $pageData->content .= "<h1>All is good</h1>";
// include blog controller
$pageData->content .= include_once 'controllers/blog.php';
// no changes below here

$page = include_once "views/page.php";
echo $page;