<?php

// complete code listing for controllers/poll.php
include_once 'models/Poll.class.php';
$poll = new Poll ();

$pollData = $poll->getPollData ();
$pollView = include_once 'views/poll-html.php';

return $pollView;