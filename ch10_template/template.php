<?php
abstract class AbstractClass
{
	public abstract function primitiveOperation1();
	public abstract function primitiveOperation2();

	public function templateMethod()
	{
		$this->primitiveOperation1();
		$this->primitiveOperation2();
		echo "end...\n";
	}

}

class ConcreteClassA extends AbstractClass
{
	public function primitiveOperation1()
	{
		echo "ConcreteClassA primitiveOperation1\n";
	}

	public function primitiveOperation2()
	{
		echo "ConcreteClassA primitiveOperation2\n";
	}
}

class ConcreteClassB extends AbstractClass
{
	public function primitiveOperation1()
	{
		echo "ConcreteClassB primitiveOperation1\n";
	}

	public function primitiveOperation2()
	{
		echo "ConcreteClassB primitiveOperation2\n";
	}
}

class Client
{
	function __construct()
	{

		$a = new ConcreteClassA;
		$a->templateMethod();
	
		$b = new ConcreteClassB;
		$b->templateMethod();
	}
}
$client = new Client;
// echo "<pre>"; print_r($client);
















