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

class CashFactory
{
	public static function createCashAccept($type)
	{
		$cs = null;
		switch ($type) {
			case 'normal':
				$cs = new CashNormal();
				break;
			case 'return':
				$cs = new CashReturn(300,100);
				break;
			case 'rebate':
				$cs = new CashRebate(0.8);
				break;
		}

		return $cs;
	}
}

class Client
{
	function __construct()
	{
		$types = ['normal','return','rebate'];
		$type = $types[rand(0,2)];
		$perPrice = 500;
		$num = 9;
		$csuper = CashFactory::createCashAccept($type);
		$totalPrices = 0;
		$totalPrices = $csuper->acceptCash($perPrice)*$num;
		$total = $total + $totalPrices;
		echo "<pre>"; print_r('per price: '. $perPrice);
		echo "<pre>"; print_r('total num: '.$num);
		echo "<pre>"; print_r('total price: '.$total);
		echo "<pre>"; print_r($type);

	}
}

new Client;













