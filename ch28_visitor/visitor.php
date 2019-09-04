<?php
abstract class Visitor
{
	abstract public function visitConcreteElementA($concreteElementA);
	abstract public function visitConcreteElementB($concreteElementB);
}

class ConcreteVisitor1 extends Visitor
{
	public function visitConcreteElementA($concreteElementA)
	{
		echo "concreteElementA is visited by ConcreteVisior1";
	}

	public function visitConcreteElementB($concreteElementA)
	{
		echo "concreteElementB is visited by ConcreteVisior1";
	}
}

class ConcreteVisitor2 extends Visitor
{
	public function visitConcreteElementA($concreteElementA)
	{
		echo "concreteElementA is visited by ConcreteVisior2";
	}

	public function visitConcreteElementB($concreteElementA)
	{
		echo "concreteElementB is visited by ConcreteVisior2";
	}
}

abstract class Element
{
	abstract public function accept($visitor);
}

class ConcreteElementA extends Element
{
	public function accept($visitor)
	{
		$visitor->visitConcreteElementA($this);
	}
}

class ConcreteElementB extends Element
{
	public function accept($visitor)
	{
		$visitor->visitConcreteElementB($this);
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

	public function accept($vistor)
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
		$o->attach(new ConcreteElementA);
		$o->attach(new ConcreteElementB);

		$concreteVisitor1 = new ConcreteVisitor1;
		$concreteVisitor2 = new ConcreteVisitor2;

		$o->accept($concreteVisitor1);
		$o->accept($concreteVisitor2);


	}
}

new Client;





















