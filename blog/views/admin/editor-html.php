<?php

$entryDataFound = isset ( $entryData );

if ($entryDataFound === false) {
	// default values for an empty editor
	$entryData = new stdClass ();
	$entryData->entry_id = 0;
	$entryData->title = "";
	$entryData->entry_text = "";
}

//changes in existing code below
//notice object properties used in <input> and <textarea>
return "<form method='post' action='admin.php?page=editor' id='editor'>
			<input type='hidden' name='id' value='$entryData->entry_id' />
			<fieldset>
				<legend>New Entry Submission</legend>
				<label>Title</label>
				<input type='text' name='title' maxlength='150' value='$entryData->title' />
				<label>Entry</label>
				<textarea name='entry'>$entryData->entry_text</textarea>
				<fieldset id='editor-buttons'>
					<input type='submit' name='action' value='save' />
					<input type='submit' name='action' value='delete' />
				</fieldset>
			</fieldset>
		</form>";