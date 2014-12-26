<?php

class Poll {
	
	// new code: declare a new property
	private $db;
	
	// new code: declare a constructor
	// method requires a database connection as argument
	public function __construct($dbConnection) {
		// store the received conection in the $this->db property
		$this->db = $dbConnection;
	}
	
	// partial code listing for models/Poll.class.php
	// udate existing method
	public function getPollData() {
		
		// the actual SQL statement
		$sql = "SELECT poll_question, yes, no FROM poll WHERE poll_id = 1";
		
		// Use the PDO connection to create a PDOStatement object
		$statement = $this->db->prepare ( $sql );
		
		// tell MySQL to execute the statement
		$statement->execute ();
		
		// retrieve the first row of data from the table
		$pollData = $statement->fetchObject ();
		
		// make poll data available to the caller
		return $pollData;
	}
	
	public function updatePoll($input) {
		
		if ($input === "yes") {
			$updateSQL = "UPDATE poll SET yes = yes + 1 WHERE poll_id = 1";
		} elseif ($input === "no") {
			$updateSQL = "UPDATE poll SET no = no + 1 WHERE poll_id = 1";
		}
		
		$updateStatement = $this->db->prepare ( $updateSQL );
		$updateStatement->execute ();
	}
}