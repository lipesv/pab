<?php

include_once 'Util/UploadException.php';

class Uploader {
	
	private $filename;
	private $fileData;
	private $destination;
	private $errorMessage;
	private $errorCode;
	
	public function __construct($key) {
		$this->filename = $_FILES [$key] ['name'];
		$this->fileData = $_FILES [$key] ['tmp_name'];
		$this->errorCode = $_FILES [$key] ['error'];
	}
	
	public function saveIn($folder) {
		$this->destination = $folder;
	}
	
	private function readyToUpload() {
		
		$folderIsWriteAble = is_writable ( $this->destination );
		
		if ($folderIsWriteAble === false) {
			
			$this->errorMessage = "Error: destination folder is ";
			$this->errorMessage .= "not writable, change permissions";
			
			$canUpload = false;
		} elseif ($this->errorCode > 0) {
			
			throw new UploadException ( $this->errorCode );
			$canUpload = false;
			
		} else {
			$canUpload = true;
		}
		
		return $canUpload;
	}
	
	public function save() {
		
		if ($this->readyToUpload ()) {
			move_uploaded_file ( $this->fileData, "$this->destination/$this->filename" );
		} else {
			$exc = new Exception ( $this->errorMessage );
			throw $exc;
		}
	}
}