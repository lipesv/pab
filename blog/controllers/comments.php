<?php

// complete code for controllers/comments.php
include_once 'models/Comment_Table.class.php';
$commentTable = new Comment_Table ( $db );

$newCommentSubmitted = isset ( $_POST ['new-comment'] );

if ($newCommentSubmitted) {
	$whichEntry = $_POST ['entry-id'];
	$user = $_POST ['user-name'];
	$comment = $_POST ['new-comment'];
	$savedComment = $commentTable->saveComment ( $whichEntry, $user, $comment );
}

$allComments = $commentTable->getAllById ( $entryId );
$commentSaved = isset ( $savedComment );

if ($commentSaved) {
	$allComments->message = "Comment successfully added";
} else {
	if ($allComments->rowCount () == 0) {
		$allComments->message = "Be the first to comment this article";
	}else {
		$allComments->message = "";
	}
}

$comments = include_once "views/comment-form-html.php";
$comments .= include_once 'views/comments-html.php';

return $comments;