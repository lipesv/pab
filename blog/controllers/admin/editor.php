<?php

// complete code for controllers/admin/editor.php

// include class definition and create an object
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table ( $db );

// was editor form submitted?
$editorSubmitted = isset ( $_POST ['action'] );

if ($editorSubmitted) {
	
	$buttonClicked = $_POST ['action'];
	
	// was "save" button clicked
	$insertNewEntry = ($buttonClicked === "save");
	
	if ($insertNewEntry) {
		
		// get title and entry data from editor form
		$title = $_POST ['title'];
		$entry = $_POST ['entry'];
		
		// save the new entry
		$entryTable->saveEntry ( $title, $entry );
	}
}

// load relevant view
$editorOutput = include_once 'views/admin/editor-html.php';
return $editorOutput;