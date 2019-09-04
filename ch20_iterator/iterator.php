<?php
abstract class Aggregate 
{
	public abstract function createIterator();
}

abstract class Iterators
{
	public abstract function first();
	public abstract function next();
	public abstract function isDone();
	public abstract function currentItem();
}

class ConcreteIterator extends Iterators
{
	private $aggregate = array();
	private $current = 0;

	function __construct($aggregate)
	{
		$this->aggregate = $aggregate;
	}

	public function first()
	{
		return $this->aggregate->getThis(0);
	}

	public function next()
	{
		$ret = null;
		$this->current++;
		if($this->current< count($this->aggregate))
		{
			$ret = $this->aggregate->getThis($this->current);
		}
		return $ret;
	}

	public function isDone()
	{
		return ($this->current>=$this->aggregate->getCount())?true:false;
	}

	public function currentItem()
	{
		return $this->aggregate->getThis($this->current);
	}
}

class ConcreteAggregate extends Aggregate
{
	private $items = array();
	public function createIterator()
	{
		return new ConcreteIterator($this);
	}

	public function getCount()
	{
		return count($this->items);
	}

	public function getThis($index)
	{
		return $this->items[$index];
	}

	public function setThis($index,$value)
	{
		$this->items[$index]= $value;
	}
}

class Client
{
	function __construct()
	{
		$a = new ConcreteAggregate();

		$a->setThis(0,"big bird");
		$a->setThis(1,"small chai");
		$a->setThis(2,"package");
		$a->setThis(3,"foreigner");
		$a->setThis(4,"employee");
		$a->setThis(5,"thief");


		$i = new ConcreteIterator($a);

		$item = $i->first();

		while(!$i->isDone())
		{
			echo $i->currentItem()."buy ticket\n";
			$i->next();
		}

	}
}

new Client;





