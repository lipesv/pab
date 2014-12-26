<?php

// complete code for controllers/blog.php
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table ( $db );

$isEntryClicked = isset ( $_GET ['id'] );
if ($isEntryClicked) {
	// show one entry . . . soon
	$entryId = $_GET ['id'];
	$blogOutput = "will soon show entry with entry_id = $entryId";
} else {
	// list all entries
	$entries = $entryTable->getAllEntries ();
	$blogOutput = include_once 'views/list-entries-html.php';
}

// code changes start here
// test completed - delete of comment out test code
// $oneEntry = $entries->fetchObject();
// $test = print_r($entryTable, true );

return $blogOutput;