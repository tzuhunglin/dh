<?php
abstract class UnitedNations
{
	public abstract function declare($message,$colleague);
}

abstract class Country
{
	protected $mediator;
	function __construct($mediator)
	{
		$this->mediator = $mediator;
	}
}

class USA extends Country
{
	function __construct($mediator)
	{
		parent::__construct($mediator);
	}

	public function declare($message)
	{
		$this->mediator->declare($message,$this);
	}

	public function getMessage($message)
	{
		echo "USA got message: ".$message."\n";
	}
}

class Iraq extends Country
{
	function __construct($mediator)
	{
		parent::__construct($mediator);
	}

	public function declare($message)
	{
		$this->mediator->declare($message,$this);
	}

	public function getMessage($message)
	{
		echo "Iraq got message: ".$message."\n";
	}
}

class UnitedNationsSecurityCouncil extends UnitedNations
{
	private $colleague1;
	private $colleague2;

	public function setColleague1($value)
	{
		$this->colleague1 = $value;
	}

	public function setColleague2($value)
	{
		$this->colleague2 = $value1;
	}

	public function declare($message, $colleague)
	{
		if($colleague == $this->colleague1)
		{
			$this->colleague2->getMessage($message);
		}
		else
		{
			$this->colleague1->getMessage($message);
		}
	}
}

class Client
{
	function __construct()
	{
		$UNSC = new UnitedNationsSecurityCouncil;
		$c1 = new USA($UNSC);
		$c2 = new Iraq($UNSC);



		$UNSC->setColleague1($c1);
		$UNSC->setColleague2($c2);
		echo "<pre>"; print_r($UNSC);

		// echo "<pre>"; print_r($c2);
		exit;
		$c1->declare("no nuclear power or fight");
		$c2->declare("none nuclear power and we are not afraid fight ");
	}
}

new Client;




















