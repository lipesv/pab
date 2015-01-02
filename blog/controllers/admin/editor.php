<?php

// include class definition and create an object
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table ( $db );

// was editor form submitted?
$editorSubmitted = isset ( $_POST ['action'] );

if ($editorSubmitted) {
	
	$buttonClicked = $_POST ['action'];
	$save = ($buttonClicked === "save");
	$id = $_POST ['id'];
	
	$insertNewEntry = ($save and $id === '0');
	// $insertNewEntry = ($buttonClicked === "save");
	
	$deleteEntry = ($buttonClicked === "delete");
	
	$updateEntry = ($save and $insertNewEntry === false);
	
	// get title and entry data from editor form
	$title = $_POST ['title'];
	$entry = $_POST ['entry'];
	
	if ($insertNewEntry) {
		$savedEntryId = $entryTable->saveEntry ( $title, $entry );
	} elseif ($updateEntry) {
		$entryTable->updateEntry ( $id, $title, $entry );
		$savedEntryId = $id;
	} elseif ($deleteEntry) {
		$entryTable->deleteEntry ( $id );
	}
}

$entryRequested = isset ( $_GET ['id'] );

if ($entryRequested) {
	$id = $_GET ['id'];
	$entryData = $entryTable->getEntry ( $id );
	$entryData->entry_id = $id;
	$entryData->legend = "Edit Entry";
	$entryData->message = "";
}

$entrySaved = isset ( $savedEntryId );

if ($entrySaved) {
	
	$entryData = $entryTable->getEntry ( $savedEntryId );
	
	if ($insertNewEntry) {
		$entryData->message = "entry was saved";
		// $entryData->legend = "New Entry Submission";
	} elseif ($updateEntry) {
		$entryData->message = "entry was successfully updated.";
	}
	
	$entryData->legend = "Edit Entry";
}

$editorOutput = include_once 'views/admin/editor-html.php';

return $editorOutput;