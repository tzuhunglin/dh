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

interface IFactory
{
	public function createLeiFeng();
}

class UndergraduateFactory Implements IFactory
{
	public function createLeiFeng()
	{
		return new Undergraduate;
	}
}

class VolunteerFactory Implements IFactory
{
	public function createLeiFeng()
	{
		return new Volunteer;
	}
}
class Client
{
	function __construct()
	{
		$factory = new UndergraduateFactory;
		$student = $factory->createLeiFeng();

		$student->buyRice();
		$student->sweep();
		$student->wash();


	}
}

new Client;