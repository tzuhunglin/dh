<?php
error_reporting(E_ALL);
class Product
{
	public $parts = array();
	public function add($part)
	{
		array_push($this->parts,$part);
	}

	public function show()
	{
		echo "\n product construct------\n";
		foreach ($this->parts as $part) {
			echo "{$part} \n";
		}
	}
}

abstract class Builder
{
	protected $product;

	function __construct()
	{
		$this->product = new Product;
	}

	public abstract function buildPartA();
	public abstract function buildPartB();
	public abstract function getResult();
}

class ConcreteBuilder1 extends Builder
{
	public function buildPartA()
	{
		$this->product->add("component A \n");
	}

	public function buildPartB()
	{
		$this->product->add("component B \n");
	}

	public function getResult()
	{
		return $this->product;
	}
}

class ConcreteBuilder2 extends Builder
{
	public function buildPartA()
	{
		$this->product->add("component X \n");
	}

	public function buildPartB()
	{
		$this->product->add("component Y \n");
	}

	public function getResult()
	{
		return $this->product;
	}
}

class Director
{
	public function construct($builder)
	{
		$builder->buildPartA();
		$builder->buildPartB();
	}
}

class Client
{
	function __construct()
	{
		$director = new Director;
		$builder1 = new ConcreteBuilder1;
		$builder2 = new ConcreteBuilder2;

		$director->construct($builder1);
		$product1 = $builder1->getResult();
		$product1->show();

		$director->construct($builder2);
		$product2 = $builder2->getResult();
		$product2->show();
	}
}

new Client;



