<?php


class AfternoonState extends State
{
	public function writeProgram($work)
	{
		if($work->getHour()<17)
		{
			echo " Time: ".$work->getHour().", still in good condition, keep going!\n";
		}
		else
		{
			$work->setState(new EveningState);
			$work->writeProgram();
		}
	}
}

class EveningState extends State
{
	public function writeProgram($work)
	{
		if($work->getTaskFinished())
		{
			$work->setState(new RestState);
			$work->writeProgram();
		}
		else
		{
			if($work->getHour()<21)
			{
				echo " Time: ".$work->getHour().", work overtime, fucking tired!\n";
			}
			else
			{
				$work->setState(new SleepingState);
				$work->writeProgram();
			}
		}
	}
}

class SleepingState extends State
{
	public function writeProgram($work)
	{
		echo " Time: ".$work->getHour().", can not bear anymore, fall into asleep!\n";
	}
}

class RestState extends State
{
	public function writeProgram($work)
	{
		echo " Time: ".$work->getHour().", go home!\n";
	}
}

abstract class State
{
	abstract public function writeProgram($work);
}

class ForenoonState extends State
{
	public function writeProgram($work)
	{
		if($work->getHour()<12)
		{
			echo " Time: ".$work->getHour().", full of energy!\n";
		}
		else
		{
			$work->setState(new NoonState);
			$work->writeProgram();
		}
	}
}

class Work
{
	private $current;
	function __construct()
	{
		$this->current = new ForenoonState;
	}

	private $hour;
	public function setHour($value)
	{
		$this->hour = $value;
	}

	public function getHour()
	{
		return $this->hour;
	}

	public function setState($state)
	{
		$this->current = $state;
	}

	private $finished = false;
	public function setTaskFinished($value)
	{
		$this->finished = $value;
	}

	public function getTaskFinished()
	{
		return $this->finished;
	}

	public function writeProgram()
	{
		$this->current->writeProgram($this);
	}
}

class NoonState extends State
{
	public function writeProgram($work)
	{
		if($work->getHour()<13)
		{
		echo " Time: ".$work->getHour().", hungry, lunch; tired, nap!\n";
		}
		else
		{
		$work->setState(new AfternoonState);
		$work->writeProgram();
		}
	}
}

class Client
{
function __construct()
{
$emergencyProjects = new Work;
// $emergencyProjects->setHour(9);
// $emergencyProjects->writeProgram();

// $emergencyProjects->setHour(10);
// $emergencyProjects->writeProgram();

// $emergencyProjects->setHour(12);
// $emergencyProjects->writeProgram();

// $emergencyProjects->setHour(13);
// $emergencyProjects->writeProgram();

// $emergencyProjects->setHour(14);
// $emergencyProjects->writeProgram();

// $emergencyProjects->setHour(17);
// $emergencyProjects->writeProgram();

// $emergencyProjects->setTaskFinished(false);
// $emergencyProjects->writeProgram();

// $emergencyProjects->setHour(19);
// $emergencyProjects->writeProgram();
$emergencyProjects->setHour(22);
$emergencyProjects->writeProgram();
}
}

new Client;
