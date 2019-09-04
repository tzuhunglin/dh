<?php
abstract class Component
{
	protected $name;
	function __construct($name)
	{
		$this->name = $name;
	}

	public abstract function add($c);
	public abstract function remove($c);
	public abstract function display($depth);
}

class Leaf extends Component
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function add($c)
	{
		echo "Cannot add to a leaf\n";
	}

	public function remove($c)
	{
		echo "Cannot remove from a leaf\n";
	}

	public function display($depth)
	{
		$str = '';
		for ($i=0; $i <$depth ; $i++) { 
			$str .= "-";
		}
		echo $str.$this->name."\n";
	}
}

class Composite extends Component
{
	public $children = array();
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function add($c)
	{
		$this->children[] = $c;
	}

	public function remove($c)
	{
		$total = count($this->children);
		for ($i=0; $i <$total ; $i++) 
		{ 
			if($this->children[$i]->name == $c->name)
			{
				unset($this->children[$i]);
				break;
			}
		}

		$this->children = array_values($this->children);
	}

	public function display($depth)
	{
		$str = '';
		for ($i=0; $i <$depth ; $i++) { 
			$str .= "-";
		}

		echo $str.$this->name."\n";
		foreach ($this->children as $c) 
		{
			$c->display($depth + 2);
		}
	}
}

class Client
{
	function __construct()
	{
		$root = new Composite("root");
		$root->add(new Leaf("Leaf A"));
		$root->add(new Leaf("Leaf B"));

		$comp = new Composite("Composite X");
		$comp->add(new Leaf("Leaf XA"));
		$comp->add(new Leaf("Leaf XB"));

		$root->add($comp);


		$comp2 = new Composite("Composite XY");
		$comp2->add(new Leaf("Leaf XYA"));
		$comp2->add(new Leaf("Leaf XYB"));

		$comp->add($comp2);

		$root->add(new Leaf("Leaf C"));

		$leaf = new Leaf("Leaf D");
		$root->add($leaf);
		$root->remove($leaf);

		$root->display(1);
	}
}

new Client;














