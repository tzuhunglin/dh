<?php
abstract class Action
{
	public abstract function getManConclusion($man);
	public abstract function getWomanConclusion($woman);
}

abstract class Person
{
	public abstract function accept($action);
}

class Success extends Action
{
	public function getManConclusion($man)
	{
		echo "man success";
	}

	public function getWomanConclusion($man)
	{
		echo "woman success";
	}
}

class Failing extends Action
{
	public function getManConclusion($man)
	{
		echo "man Failing";
	}

	public function getWomanConclusion($man)
	{
		echo "woman Failing";
	}
}

class Man extends Person
{
	public function accept($vistor)
	{
		$vistor->getManConclusion($this);
	}
}

class Woman extends Person
{
	public function accept($vistor)
	{
		$vistor->getWomanConclusion($this);
	}
}

class ObjectStructure
{
	private $elements = array();
	public function attach($element)
	{
		$this->elements[]=$element;
	}

	public function detach($element)
	{
		$total = count($element);
		for ($i=0; $i <$total ; $i++) { 
			if($this->elements[$i]==$element)
			{
				unset($this->elements[$i]);
			}
		}
		$this->elements = array_values($this->elements);
	}

	public function display($vistor)
	{
		foreach ($this->elements as $key => $value) {
			$value->accept($vistor);
		}
	}
}

class Client
{
	function __construct()
	{
		$o = new ObjectStructure;
		$o->attach(new Man);
		$o->attach(new Woman);

		$success = new Success;
		$o->display($success);

		$failing = new Failing;
		$o->display($failing);		
	}


	// $amativeness = new Amativeness;
	// $o->display($amativeness);

	// $marriage = new Marriage;
	// $o->display($marriage);
}

new Client;


























