<?php
interface Subject
{
	public function attach($observer);
	public function detach($observer);
	public function notify();
	public function setSubjectState($observer);
	public function getSubjectState();
}

class Boss implements Subject
{
	private $observers = array();
	private $action;

	public function attach($observer)
	{
		array_push($this->observers,$observer);
	}

	public function detach($observer)
	{
		$key = array_search($observer->name,$this->observers);
		unset($this->observers[$key]);

		$this->observers=array_values($this->observers);
	}	

	public function setSubjectState($value)
	{
		$this->action = $value;
	}

	public function getSubjectState()
	{
		return $this->action;
	}

	public function notify()
	{
		foreach ($this->observers as $observer) 
		{
			$observer->update();
		}
	}
}

abstract class Observers
{
	public $name;
	protected $sub;

 	function __construct($name,$sub)
 	{
 		$this->name = $name;
 		$this->sub = $sub;
 	}

 	abstract public function update();
}

class StockObserver extends Observers
{
	public function __construct($name,$sub)
	{
		parent::__construct($name,$sub);
	}

	public function update()
	{
		echo "close the stock information, keep working \n";
	}
}

class Client
{
	function __construct()
	{
		$huhansan = new Boss;
		$t1 = new StockObserver("t1",$huhansan);
		$t2 = new StockObserver("t2",$huhansan);
		$huhansan->attach($t1);
		$huhansan->attach($t2);

		$huhansan->detach($t1);

		$huhansan->setSubjectState("I ,boss, am back");

		$huhansan->notify();
	}

}

new Client;





















