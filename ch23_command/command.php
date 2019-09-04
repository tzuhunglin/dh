<?php
abstract class Command
{
	protected $receiver;
	function __construct($receiver)
	{
		$this->receiver = $receiver;
	}

	abstract public function execute();
}

class ConcreteCommand extends Command
{
	function __construct($receiver)
	{
		parent::__construct($receiver);
	}

	public function execute()
	{
		$this->receiver->action();
	}
}

class Invoker
{
	private $command;
	public function setCommand($command)
	{
		$this->command = $command;
	}

	public function executeCommand()
	{
		$this->command->execute();
	}	
}

class Receiver
{
	public function action()
	{
		echo "execute action \n";
	}
}

class Client
{
	function __construct()
	{
		$r = new Receiver;
		$c = new ConcreteCommand($r);
		$i = new Invoker;

		$i->setCommand($c);
		$i->executeCommand();
	}
}

new Client;















