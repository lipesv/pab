<?php

// complete code for models/Comment_Table.class.php
class Comment_Table {
	
	private $db;
	
	public function __construct($db) {
		$this->db = $db;
	}
	
	private function makeStatement($sql, $data = NULL) {
		
		$statement = $this->db->prepare ( $sql );
		
		try {
			$statement->execute ( $data );
		} catch ( Exception $e ) {
			$exceptionMessage = "<p>You tried to run this sql: $sql </p>
								 <p>Exception: $e</p>";
			trigger_error ( $exceptionMessage );
		}
		
		return $statement;
	}
}