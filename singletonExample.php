<?php

class MySingleton {
	private static $instance;

	private function __construct(){}
	private function __clone(){}
	private function __wakeup(){}

	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
} 

$instance = MySingleton::getInstance();
$instance2 = MySingleton::getInstance();

print_r($instance);
echo '<br>';
print_r($instance2);
echo '<br>';
print_r($instance === $instance2);
exit;

?>