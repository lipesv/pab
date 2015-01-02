<?php

// complete code for views/search-results-html.php
$searchDataFound = isset ( $searchData );

if ($searchDataFound === false) {
	trigger_error ( 'views/search-results-html.php needs $searchData' );
}

$searchHTML = "<section id='search'>";

if ($searchData->rowCount () == 0) {
	$searchHTML .= "<p>No entries match your search</p>";
} else {
	
	$searchHTML .= "<p>You searched for <em>$searchTerm</em></p><ul>";
	
	while ( $searchRow = $searchData->fetchObject () ) {
		$href = "index.php?page=blog&amp;id=$searchRow->entry_id";
		$searchHTML .= "<li><a href='$href'>$searchRow->title</li>";
	}
	
	$searchHTML .= "</ul>";
}

$searchHTML .= "</section>";

return $searchHTML;