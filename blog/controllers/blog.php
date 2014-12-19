<?php

// complete code for controllers/blog.php
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table ( $db );

// $entries is the PDOStatement returned from getAllEntries
$entries = $entryTable->getAllEntries ();

// fetch data from the first row as a StdClass object
$oneEntry = $entries->fetchObject ();

// print the object
$test = print_r ( $oneEntry, true );

// return the printed object to index to see it in browser
return "<pre>$test</pre>";