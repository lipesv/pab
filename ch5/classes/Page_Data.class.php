<?php

class Page_Data {
	
	public $title = "";
	public $content = "";
	public $css = "";
	public $embeddedStyle = "";
	public $scriptElements = "";
	
	public function addCSS($href) {
		$this->css .= "<link href='$href' rel='stylesheet' />";
	}
	
	public function addScript($src) {
		$this->scriptElements .= "<script src='$src'></script>";
	}
}