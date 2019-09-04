<?php
abstract class Mediator
{
	abstract public function send($message,$colleague);
}

abstract class Colleague
{
	protected $mediator;
	function __construct($mediator)
	{
		$this->mediator = $mediator;
	}
}


class ConcreteMediator extends Mediator
{
	private $colleague1;
	private $colleague2;

	public function setColleague1($colleague)
	{
		$this->colleague1 = $colleague;
	}

	public function setColleague2($colleague)
	{
		$this->colleague2 = $colleague;
	}
	
	public function send($message,$colleague)
	{
		if($colleague == $this->colleague1)
		{
			$this->colleague2->notify($message);
		}
		else
		{
			$this->colleague1->notify($message);
		}
	}
}

class ConcreteColleague1 extends Colleague
{
	function __construct($mediator)
	{
		parent::__construct($mediator);
	}

	public function send($message)
	{
		$this->mediator->send($message,$this);
	}

	public function notify($message)
	{
		echo "colleague1 get ".$message."\n";
	}
}

class ConcreteColleague2 extends Colleague
{
	function __construct($mediator)
	{
		parent::__construct($mediator);
	}

	public function send($message)
	{
		$this->mediator->send($message,$this);
	}

	public function notify($message)
	{
		echo "colleague2 get ".$message."\n";
	}
}

class Client
{
	function __construct()
	{
		$m = new ConcreteMediator;
		$c1 = new ConcreteColleague1($m);
		$c2 = new ConcreteColleague2($m);

		$m->setColleague1($c1);
		$m->setColleague2($c2);

		$c1->send("eat?\n");
		$c2->send("not yet and you?\n");

	}
}

new Client;






























