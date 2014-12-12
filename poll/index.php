<?php

error_reporting ( E_ALL );
ini_set ( "display_errors", 1 );

// load model
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data ();
$pageData->title = "PHP/MySQL site poll example";
$pageData->content .= "<h1>Everything works so far!</h1>";

// new line of code to load poll controller
$pageData->content = include_once 'controllers/poll.php';

// load view so model data will be merged with the page template
$page = include_once 'views/page.php';
// output generated page
echo $page;