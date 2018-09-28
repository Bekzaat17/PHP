<?php
abstract class Employee{
	protected $name;
	private static $types = array('Minion','CluedUp','WellConnected');
	
	static function create($name){
		$num = rand (1, count(self::$types))-1;
		$class = self::$types[$num];
		return new $class($name);
	}
	
	function __construct($name){
		$this->name = $name;
	}
	
	abstract function fire();
}

class Minion extends Employee {
	function fire(){
		print "{$this->name}: fired! <br>";
	}
}

class NastyBoss {
	private $employees = array();
	
	function calculate(){
		print count($this->employees). "<br>";
	}
	
	function addEmployee(Employee $empName){
		$this->employees[] = $empName;
	}
	function projectFails(){
		if(count($this->employees) > 0){
			$emp = array_pop ($this->employees);
			$emp->fire();
		}
	}
}

class CluedUp extends Employee{
	function fire(){
		print "{$this->name}: Call your lawer! <br>";
	}
}

class WellConnected extends Employee{
	function fire(){
		print "{$this->name}: Call your Daddy! <br>";
	}
}

$boss = new NastyBoss();
$boss->calculate();
$boss->addEmployee(Employee::create("Mariya"));
$boss->addEmployee(Employee::create("Conor"));
$boss->addEmployee(Employee::create("Khabib"));
$boss->addEmployee(Employee::create("Denis"));
$boss->addEmployee(Employee::create("John"));
$boss->calculate();
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();
$boss->calculate();


?>