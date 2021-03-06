<?php

// complete code for controllers/admin/images.php
include_once 'models/Uploader.class.php';
$imageSubmitted = isset ( $_POST ['new-image'] );

if ($imageSubmitted) {
	
	$uploader = new Uploader ( 'image-data' );
	$uploader->saveIn ( 'img' );
	try {
		$uploader->save ();
		// create an upload message that confirms succesful upload
		$uploadMessage = "file uploaded!";
	} catch ( Exception $exception ) {
		// use the exception to create an upload message
		$uploadMessage = $exception->getMessage ();
	}
}

// new code starts here: if a delete link was clicked...
$deleteImage = isset ( $_GET ['delete-image'] );

if ($deleteImage) {
	// grab the src of the image to delete
	$whichImage = $_GET ['delete-image'];
	unlink ( $whichImage );
}

$imageManagerHTML = include_once "views/admin/images-html.php";
return $imageManagerHTML;