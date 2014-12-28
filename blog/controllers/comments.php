<?php

// complete code for controllers/comments.php
include_once 'models/Comment_Table.class.php';
$commentTable = new Comment_Table ( $db );

$comments = include_once "views/comment-form-html.php";

$allComments = $commentTable->getAllById ( $entryId );

// notice the incremental concatenation operator .=
$comments .= include_once 'views/comments-html.php';

return $comments;