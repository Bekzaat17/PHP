<?php
//example of Singletone pattern
class MySingletone {
	private $props = array();
	private static $instance;
	
	private function __construct(){}
	
	public static function getInstance(){
		if( empty(self::$instance)){
			self::$instance = new MySingletone();
		}
	}
	
	public function setProperty($key, $val){
		$this->props[$key]=$val;
	}
	public function getProperty($key){
		return $this->props[$key];
	}
	
}

$pref = MySingletone::getInstance();
$pref->setProperty("name","Ivan");
unset( $pref );

$pref2 = MySingletone::getInstance();
print $pref2->getProperty("name");



?>