<?php

class Poll {

	//new code: declare a new property
	private $db;
	
	public function getPollData() {
		
		$pollData = new stdClass ();
		
		$pollData->poll_question = "just testing...";
		$pollData->yes = 0;
		$pollData->no = 0;
		
		return $pollData;
	}
}