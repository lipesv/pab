<?php

// complete code for controller/admin/entries.php
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table ( $db );

// get a PDOStatement object to get access to all entries
$allEntries = $entryTable->getAllEntries ();
$entriesAsHTML = include_once 'views/admin/entries-html.php';

return $entriesAsHTML;