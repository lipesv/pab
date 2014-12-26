<?php

// complete code listing for models/Blog_Entry_Table.class.php
class Blog_Entry_Table {
	
	private $db;
	
	public function __construct($db) {
		$this->db = $db;
	}
	
	public function saveEntry($title, $entry) {
		
		// notice placeholders in SQL string. ? is a placeholder
		// notice the order of attributes: first title, next entry_text
		$entrySQL = "INSERT INTO  simple_blog.blog_entry(title, entry_text)
						VALUES(?, ?)";
		
		$entryStatement = $this->db->prepare ( $entrySQL );
		
		// create an array with dynamic data
		// Order is important: $title must come first, $entry second
		$formData = array (
				$title,
				$entry 
		);
		
		try {
			
			// pass $formData as argument to execute
			$entryStatement->execute ( $formData );
		} catch ( Exception $e ) {
			
			$msg = "<p>You tried to run this sql: $entrySQL</p>
				<p>Exception: $e</p>";
			
			trigger_error ( $msg );
		}
	}
	
	public function getAllEntries() {
		
		$sql = "SELECT entry_id
					  ,title
					  ,SUBSTRING(entry_text, 1, 150) AS intro
  				FROM blog_entry";
		
		$statement = $this->db->prepare ( $sql );
		
		try {
			$statement->execute ();
		} catch ( Exception $e ) {
			$exceptionMessage = "<p>You tried to run this sql: $sql </p>
								 <p>Exception: $e</p>";
		}
		
		return $statement;
	}
	
	// partial code for models/Blog_Entry_Table.class.php
	// declare a new method inside the class code block
	// do not change any existing methods
	public function getEntry($id) {
		
		$sql = "SELECT entry_id, title, entry_text, date_created
				FROM blog_entry
				WHERE entry_id = ?";
		
		$statement = $this->db->prepare ( $sql );
		
		$data = array (
				$id 
		);
		
		try {
			$statement->execute ( $data );
		} catch ( Exception $e ) {
			$exceptionMessage = "<p>You tried to run this sql: $sql </p>
								 <p>Exception: $e</p>";
			trigger_error ( $exceptionMessage );
		}
		
		$model = $statement->fetchObject ();
		
		return $model;
	}
}
