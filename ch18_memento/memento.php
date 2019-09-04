<?php 
class Originator
{
	private $state;
	public function getState()
	{
		return $this->state;
	}

	public function setState($value)
	{
		$this->state = $value;
	}

	public function createMemento()
	{
		return new Memento($this->state);
	}

	public function setMemonto($memento)
	{
		$this->state = $memento->getState();
	}

	public function show()
	{
		echo "State = ".$this->state."\n";
	}
}

class Memento
{
	private $state;
	function __construct($state)
	{
		$this->state = $state;
	}

	public function getState()
	{
		return $this->state;
	}
}

class Caretaker
{
	private $memento;
	public function getMemento()
	{
		return $this->memento;
	}
	public function setMemento($value)
	{
		$this->memento = $value;
	}
}

class Client
{
	function __construct()
	{
		$o = new Originator;
		$o->setState("on");
		$o->show();

		$c = new Caretaker;
		$c->setMemento($o->createMemento());

		$o->setState("off");
		$o->show();

		$o->setMemonto($c->getMemento());
		$o->show();
	}
}

new Client;






















