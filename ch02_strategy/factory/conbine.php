<?php
abstract class CashSuper
{
	public abstract function acceptCash($money);
}

class CashNormal extends CashSuper
{
	public function acceptCash($money)
	{
		return $money;
	}
}

class CashRebate extends CashSuper
{
	private $moneyRebate = 1;
	function __construct ($moneyRebate)
	{
		$this->moneyRebate = $moneyRebate;
	}
	public function acceptCash($money)
	{
		return $money * $this->moneyRebate;
	}
}


class CashReturn extends CashSuper
{
	private $moneyCondition = 0;
	private $moneyReturn = 0;
	function __construct($moneyCondition,$moneyReturn)
	{
		$this->moneyCondition = $moneyCondition;
		$this->moneyReturn = $moneyReturn;
	}

	public function acceptCash($money)
	{
		$result = $money;
		if($money >= $moneyCondition)
		{
			$result = $money - ($money/$this->moneyCondition) * $this->moneyReturn;
		}
		return $result;
	}
}

class CashContext
{
	private $cs= null;
	function __construct($type)
	{
		switch ($type) {
			case 'normal':
				$this->cs = new CashNormal();
				break;
			case 'return':
				$this->cs = new CashReturn(300,100);
				break;
			case 'rebate':
				$this->cs = new CashRebate(0.8);
				break;
		}
	}

	public function getResult($money)
	{
		return $this->cs->acceptCash($money);
	}
}

class Client
{
	public $total = 0;
	function __construct()
	{
		$types = ['normal','return','rebate'];
		$type = $types[rand(0,2)];
		$perPrice = 500;
		$num = 9;
		$csuper = new CashContext($type);		

		$totalPrices = 0;
		$totalPrices = $csuper->getResult($perPrice*$num);
		$total = $total + $totalPrices;
		echo "<pre>"; print_r('per price: '. $perPrice);
		echo "<pre>"; print_r('total num: '.$num);
		echo "<pre>"; print_r('total price: '.$total);
		echo "<pre>"; print_r($type);
	}
}

new Client;




















