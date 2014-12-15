<?php

// complete code listing for controllers/poll.php
include_once 'models/Poll.class.php';
//Only change here: pass PDO object as argument
$poll = new Poll($db);

$pollData = $poll->getPollData ();
$pollView = include_once 'views/poll-html.php';

return $pollView;