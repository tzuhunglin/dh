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
		echo " decorator: ".$this->name."\n";
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
		echo "Sneaker \n";
	}
}

class TShirt extends Finery
{
	public function show()
	{
		parent::show();
		echo "TShirt \n";
	}
}

class BigTrouser extends Finery
{
	public function show()
	{
		parent::show();
		echo "BigTrouser \n";
	}
}

class LeatherShoes extends Finery
{
	public function show()
	{
		parent::show();
		echo "LeatherShoes \n";
	}
}

class Tie extends Finery
{
	public function show()
	{
		parent::show();
		echo "Tie \n";
	}
}

class Suit extends Finery
{
	public function show()
	{
		parent::show();
		echo "Suit \n";
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

		echo " This second decorator \n";

		$leatherShoes = new LeatherShoes;
		$tie = new Tie;
		$suit = new Suit;

		$leatherShoes->decorate($xc);
		$tie->decorate($leatherShoes);
		$suit->decorate($tie);
		$suit->show();
	}
}

new Client;





























