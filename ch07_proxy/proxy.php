<?php 
class SchoolGirl
{ 
	private $name;
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

Interface GiveGift
{
	public function giveDolls();
	public function giveFlowers();
	public function giveChocolate();
}

class Pursuit implements GiveGift
{
	private $mm;
	function __construct($mm)
	{
		$this->mm = $mm;
	}

	public function giveDolls()
	{
		echo "give dolls \n";
	}

	public function giveFlowers()
	{
		echo "give flowers \n";
	}

	public function giveChocolate()
	{
		echo "give chocolate \n";
	}
}

class Proxy implements GiveGift
{
	private $gg;
	function __construct($mm)
	{
		$this->gg = new Pursuit($mm);
	}

	public function giveDolls()
	{
		echo $this->gg->giveDolls();
	}

	public function giveFlowers()
	{
		echo $this->gg->giveFlowers();
	}

	public function giveChocolate()
	{
		echo $this->gg->giveChocolate();
	}
}

class Client
{
	function __construct()
	{
		$jiaojiao = new SchoolGirl;
		$jiaojiao->setName('jiaojiao');

		$daili = new Proxy($jiaojiao);

		$daili->giveDolls();
		$daili->giveFlowers();
		$daili->giveChocolate();
	}
}

new Client;




























