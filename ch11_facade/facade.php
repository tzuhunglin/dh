<?php
class SubSystemOne
{
	public function methodOne()
	{
		echo "SubSystemOne methodOne\n";
	}
}

class SubSystemTwo
{
	public function methodTwo()
	{
		echo "SubSystemOne methodTwo\n";
	}
}

class SubSystemThree
{
	public function methodThree()
	{
		echo "SubSystemOne methodThree\n";
	}
}

class SubSystemFour
{
	public function methodFour()
	{
		echo "SubSystemOne methodFour\n";
	}
}

class Facade
{
	public $one;
	public $two;
	public $three;
	public $four;

	function __construct()
	{
		$this->one = new SubSystemOne;
		$this->two = new SubSystemTwo;
		$this->three = new SubSystemThree;
		$this->four = new SubSystemFour;
	}

	public function methodA()
	{
		echo "methodA\n";
		$this->one->methodOne();
		$this->two->methodTwo();
		$this->four->methodFour();
	}

	public function methodB()
	{
		echo "methodB\n";
		$this->two->methodTwo();
		$this->three->methodThree();
	}
}

class Client
{
	function __construct()
	{
		$facade = new Facade;
		$facade->methodA();
		$facade->methodB();
	}
}

new Client;






















