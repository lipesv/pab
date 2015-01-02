<?php

// complete code for models/Admin_Table.class.php
// include parent class' definition
include_once 'models/Table.class.php';

class Admin_Table extends Table {
	
	public function create($email, $password) {
		
		$this->checkEmail ( $email );
		
		$sql = "INSERT INTO admin ( email, password )
				VALUES( ?, MD5(?) )";
		
		$data = array (
				$email,
				$password 
		);
		
		$this->makeStatement ( $sql, $data );
	}
	
	private function checkEmail($email) {

		$sql = "SELECT email FROM admin WHERE email = ?";
		
		$data = array (
				$email 
		);
		
		$this->makeStatement ( $sql, $data );
		$statement = $this->makeStatement ( $sql, $data );
		
		if ($statement->rowCount () === 1) {
			$e = new Exception ( "Error: '$email' already used!" );
			throw $e;
		}
	}
	
	public function checkCredentials($email, $password) {
		
		$sql = "SELECT email
 				FROM admin
 				WHERE email = ? AND password = md5(?)";
		
		$data = array (
				$email,
				$password 
		);
		
		$statement = $this->makeStatement ( $sql, $data );
		
		if ($statement->rowCount () === 1) {
			$out = true;
		} else {
			
			$sql = "SELECT email
  					FROM admin
 					WHERE email = ?";
			
			$data = array (
					$email 
			);
			
			$statement = $this->makeStatement ( $sql, $data );
			
			if ($statement->rowCount () === 1) {
				$loginProblem = new Exception ( "Wrong password, please try again." );
			} else {
				$loginProblem = new Exception ( "The supplied e-mail does not match any record in the system, please try again" );
			}
			
			throw $loginProblem;
		}
		
		return $out;
	}
}