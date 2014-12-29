<?php

include_once 'models/Table.class.php';

class Comment_Table extends Table {
	
	public function saveComment($entryId, $author, $txt) {
		
		$sql = "INSERT INTO comment(entry_id, author, txt)
				VALUES (?, ?, ?)";
		
		$data = array (
				$entryId,
				$author,
				$txt 
		);
		
		$statement = $this->makeStatement ( $sql, $data );
		
		return $this->db->lastInsertId ();
	}
	
	function getAllById($id) {

		$sql = "SELECT author, txt, `date`
  				FROM comment
 				WHERE entry_id = ?
				ORDER BY comment_id DESC";
		
		$data = array (
				$id 
		);
		
		$statement = $this->makeStatement ( $sql, $data );
		
		return $statement;
	}
}