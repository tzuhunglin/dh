<?php
abstract class Implementor
{
	public abstract function Operation();
}

class ConcreteImplementorA extends Implementor
{
	public function operation()
	{
		echo "concreteA implementor operation\n";
	}
}

class ConcreteImplementorB extends Implementor
{
	public function operation()
	{
		echo "concreteB implementor operation\n";
	}
}

class Abstraction
{
	protected $implementor;
	public function setImplementor($implementor)
	{
		$this->implementor = $implementor;
	}

	public function operation()
	{
		$this->operation();
	}
}

class RefinedAbstraction extends Abstraction
{
	public function operation()
	{
		$this->implementor->operation();
	}
}

class Client
{
	function __construct()
	{
		$ab = new RefinedAbstraction();

		$ab->setImplementor(new ConcreteImplementorA);
		$ab->operation();

		$ab->setImplementor(new ConcreteImplementorB);
		$ab->operation();
	}
}

new Client;










