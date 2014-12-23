<?php

// complete code for controllers/blog.php
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table ( $db );

// $entries is the PDOStatement returned from getAllEntries
$entries = $entryTable->getAllEntries ();

// code changes start here
// test completed - delete of comment out test code
// $oneEntry = $entries->fetchObject();
// $test = print_r($entryTable, true );

// load the view
$blogOutput = include_once 'views/list-entries-html.php';
return $blogOutput;