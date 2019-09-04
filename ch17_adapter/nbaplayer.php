<?php
abstract class Player
{
	protected $name;
	public function __construct($name)
	{
		$this->name = $name;
	}

	public abstract function attack();
	public abstract function defense();
}

class Forwards extends Player
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function attack()
	{
		echo "forwards attact \n";
	}

	public function defense()
	{
		echo "forwards defense \n";
	}
}

class Centers extends Player
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function attack()
	{
		echo "centers attact \n";
	}

	public function defense()
	{
		echo "centers defense \n";
	}
}

class Guards extends Player
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function attack()
	{
		echo "guards attact \n";
	}

	public function defense()
	{
		echo "guards defense \n";
	}
}

class ForeignCenter 
{
	public $name;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function gongi()
	{
		echo "zhonphone gongi \n";
	}

	public function funso()
	{
		echo "zhonphone funso \n";
	}
}

class Translator extends Player
{
	public $wjzf;
	function __construct($name)
	{
		parent::__construct($name);
		$this->wjzf = new ForeignCenter;
		$this->wjzf->name = $name;
	}

	public function attack()
	{
		$this->wjzf->gongi();
	}

	public function defense()
	{
		$this->wjzf->funso();
	}
}

class Client
{
	function __construct()
	{
		$playerB = new Forwards("Batier");
		$playerB->attack();

		$playerM = new Forwards("McGrady");
		$playerM->attack();

		$playerY = new Translator("Yao Min");
		$playerY->attack();
	}
}

new Client;
