/**
 * 
 */

// complete code for js/editor.js
function checkTitle(event) {

	var title = document.querySelector("input[name='title']");
	var warning = document.querySelector("p#editor-message");

	if (title.value === "") {
		event.preventDefault();
		warning.innerHTML = "*You must write a title for the entry";
	}

}

function checkLogin(event) {

	var email = document.querySelector("input[name='email']");
	var password = document.querySelector("input[name='password']");

	var warning = document.querySelector("p#admin-form-message");

	if (email.value === "" || password.value === "") {

		event.preventDefault();

		if (email.value === "") {
			warning.innerHTML = "*You must inform a valid email address for logging in";
		} else if (password.value === "") {
			warning.innerHTML = "*You must inform a password for logging in";
		}
	}

}

// new code: declare a new function
function updateEditorMessage() {
	var p = document.querySelector("#editor-message");
	p.innerHTML = "Changes not saved!";
}

function init() {

	var editorForm = document.querySelector("form#editor");
	var loginForm = document.querySelector("form#login");

	var title = document.querySelector("input[name='title']");

	var email = document.querySelector("input[name='email']");
	var password = document.querySelector("input[name='password']");

	if (editorForm) {
		title.required = false;
		title.addEventListener("keyup", updateEditorMessage, false);
		editorForm.addEventListener("submit", checkTitle, false);
	}

	if (loginForm) {
		email.required = false;
		password.required = false;
		loginForm.addEventListener("submit", checkLogin, false);
	}

}

document.addEventListener("DOMContentLoaded", init, false);