<?php
abstract class HandsetSoft
{
	public abstract function run();
}

class HandsetGame extends HandsetSoft
{
	public function run()
	{
		echo "run handset game\n";
	}
}

class HandsetAddressList extends HandsetSoft
{
	public function run()
	{
		echo "run handset addresslist\n";
	}
}

abstract class HandsetBrand
{
	protected $soft;
	public function setHandsetSoft($soft)
	{
		$this->soft = $soft;
	}

	public abstract function run();
}

class HandsetBrandN extends HandsetBrand
{
	public function run()
	{
		$this->soft->run();
	}
}

class HandsetBrandM extends HandsetBrand
{
	public function run()
	{
		$this->soft->run();
	}
}

class Client
{
	function __construct()
	{
		$ab = new HandsetBrandN;

		$ab->setHandsetSoft(new HandsetGame);
		$ab->run();

		$ab->setHandsetSoft(new HandsetAddressList);
		$ab->run();

		$ab = new HandsetBrandM;

		$ab->setHandsetSoft(new HandsetGame);
		$ab->run();

		$ab->setHandsetSoft(new HandsetAddressList);
		$ab->run();


	}
}

new Client;






















