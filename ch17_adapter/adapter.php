<?php
class Target
{
	public function request()
	{
		echo "common request \n";
	}
}

class Adaptee
{
	public function specificRequest()
	{
		echo "specific request \n";
	}
}

class Adapter extends Target
{
	private $adaptee;
	function __construct()
	{
		$this->adaptee = new Adaptee;
	}

	public function request()
	{
		$this->adaptee->specificRequest();
	}
}

class Client
{
	function __construct()
	{
		$target = new Adapter;
		$target->request();
	}
}

new Client;