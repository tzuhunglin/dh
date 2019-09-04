<?php 
class Person
{
	public $name;
	function __construct($name=null)
	{
		$this->name = $name;
	}

	public function show()
	{
		echo " decorator ".$this->name;
	} 
}

class Finery extends Person
{
	protected $component=null;
	public function decorate($component)
	{
		$this->component = $component;
	}

	public function show()
	{
		if($this->component!=null)
		{
			$this->component->show();
		}
	}
}

class Sneaker extends Finery
{
	public function show()
	{
		parent::show();
		
		echo "Sneaker ";
	}
}

class TShirt extends Finery
{
	public function show()
	{
		parent::show();

		echo "TShirt ";
	}
}

class BigTrouser extends Finery
{
	public function show()
	{
		parent::show();

		echo "BigTrouser ";
	}
}

class Client
{
	function __construct()
	{
		$xc = new Person("xc");

		echo " This first decorator \n";

		$sneaker = new Sneaker;
		$bigTrouser = new BigTrouser;
		$TShirt = new TShirt;

		$sneaker->decorate($xc);
		$bigTrouser->decorate($sneaker);
		$TShirt->decorate($bigTrouser);
		$TShirt->show();
	}
}

new Client;





























