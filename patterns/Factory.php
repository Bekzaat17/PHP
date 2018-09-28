<?php
//example of Factory pattern
abstract class ApptEncoder{
	abstract function encoder();
}

abstract class CommsManager{
	abstract function getHeaderText();
	abstract function getApptEncoder();
	abstract function getFooterText();
}

class BloggsApptEncoder extends ApptEncoder{
	function encoder(){
		return "Your Data encoded in BloggsCal format!<br>";
	}
}

class BloggsCommsManager extends CommsManager{
	function getHeaderText(){
		return "BloggsCal header text!<br>";
	}
	function getApptEncoder(){
		return new BloggsApptEncoder();
	}
	function getFooterText(){
		return "BloggsCal footer text!<br>";
	}
}

$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encoder();
print $mgr->getFooterText();





?>