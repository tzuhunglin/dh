<?php
abstract class Command
{
	protected $receiver;
	function __construct($receiver)
	{
		$this->receiver = $receiver;
	}

	abstract public function executeCommand();
}

class BakeMuttonCommand extends Command
{
	function __construct($receiver)
	{
		parent::__construct($receiver);
	}

	public function executeCommand()
	{
		$this->receiver->bakeMutton();
	}

	public function toString()
	{
		return "BakeMuttonCommand";
	}
}

class BakeChickenWingCommand extends Command
{
	function __construct($receiver)
	{
		parent::__construct($receiver);
	}

	public function executeCommand()
	{
		$this->receiver->BakeChickenWing();
	}
	public function toString()
	{
		return "BakeChickenWingCommand";
	}
}

class Waiter
{
	private $orders = array();
	public function setOrder($command)
	{
		$this->orders[] = $command;
		echo "add new order".$command->toString()."\n";
	}

	public function cancelOrder($command)
	{
		$total = count($this->$orders);
		for ($i=0; $i <$total ; $i++) 
		{ 
			if($this->$orders[$i]->toString()==$command->toString());
			unset($this->$orders[$i]);
		}
		$this->$orders = array_values($this->$orders[$i]);
	}

	public function notify()
	{
		foreach ($this->orders as $order) 
		{
			$order->executeCommand();
		}
	}
}

class Barbecuer
{
	public function bakeMutton()
	{
		echo "bake mutton \n";
	}

	public function bakeChickenWing()
	{
		echo "bake chicken wing\n";
	}
}

class Client
{
	function __construct()
	{
		$boy = new Barbecuer();
		$BakeMuttonCommand1 = new BakeMuttonCommand($boy);
		$BakeMuttonCommand2 = new BakeMuttonCommand($boy);
		$BakeChickenWingCommand1 = new BakeChickenWingCommand($boy);
		// echo "<pre>"; print_r($BakeChickenWingCommand1->executeCommand());exit;

		$girl = new Waiter;

		$girl->setOrder($BakeMuttonCommand1);
		$girl->setOrder($BakeMuttonCommand2);
		$girl->setOrder($BakeChickenWingCommand1);
		$girl->notify();
	}
}

new Client;























