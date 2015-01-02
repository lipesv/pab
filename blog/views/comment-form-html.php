<?php

// complete code for views/comment-form-html.php
$idIsFound = isset ( $entryId );

if ($idIsFound === false) {
	trigger_error ( 'views/comments-html.php needs an $entryId' );
}

return "<form action='index.php?page=blog&amp;id=$entryId' method='post' id='comment-form'>
			<p id='comment-form-message'>$allComments->message</p>
			<input type='hidden' name='entry-id' value='$entryId' />
			<label>Your name</label>
			<input type='text' name='user-name' />
			<label>Your comment</label>
			<textarea name='new-comment'></textarea>
			<input type='submit' value='post!' />
		</form>";