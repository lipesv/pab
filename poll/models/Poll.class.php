<?php

class Poll {
	
	public function getPollData() {
		
		$pollData = new stdClass ();
		
		$pollData->poll_question = "just testing...";
		$pollData->yes = 0;
		$pollData->no = 0;
		
		return $pollData;
	}
}