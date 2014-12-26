/**
 * 
 */

// complete code for js/editor.js
function checkTitle(event) {

	var title = document.querySelector("input[name='title']");
	var warning = document.querySelector("form #title-warning");

	// if title is empty...
	if (title.value === "") {
		// preventDefault, ie don't submit the form
		event.preventDefault();
		// display a warning
		warning.innerHTML = "*You must write a title for the entry";
	}

}

function init() {
	var editorForm = document.querySelector("form#editor");
	editorForm.addEventListener("submit", checkTitle, false);
}

document.addEventListener("DOMContentLoaded", init, false);