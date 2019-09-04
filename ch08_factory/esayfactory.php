<?php
class LeiFeng
{
	public function sweep()
	{
		echo "sweep \n";
	}

	public function wash()
	{
		echo "wash \n";
	}

	public function buyRice()
	{
		echo "buy rice \n";
	}
}

class Undergraduate extends LeiFeng
{

}

class Volunteer extends LeiFeng
{

}

class SimpleFactory
{
	public static function createLeiFeng($type)
	{
		$result = null;
		switch ($type) {
			case 'undergraduate':
				$result = new Undergraduate;
				break;
			case 'volunteer':
				$result = new Volunteer;
				break;
		}
		return $result;
	}
}

class Client
{
	function __construct()
	{
		$studentA = SimpleFactory::createLeiFeng('undergraduate');
		$studentA->buyRice();

		$studentB = SimpleFactory::createLeiFeng('undergraduate');
		$studentB->sweep();

		$studentC = SimpleFactory::createLeiFeng('undergraduate');
		$studentC->wash();

	}
}

new Client;