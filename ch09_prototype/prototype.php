<?php
class Resume 
{
	private $name;
	private $sex;
	private $age;
	private $timeArea;
	private $company;

	private $work;

	function __construct($name)
	{
		$this->name=$name;
		$this->work = new WorkExperience;
		
	}

	public function setPersonalInfo($sex,$age)
	{
		$this->sex = $sex;
		$this->age = $age;
	}

	public function setWorkExperience($workDate, $company)
	{
		$this->work->pubWorkDate = $workDate;
		$this->work->pubCompnay = $company;
	}

	public function display()
	{
		echo "<pre>"; print_r($this);
	}

	public function clone()
	{
		return clone $this;
	}
}

class WorkExperience
{
	private $priWorkDate;
	public $pubWorkDate;

	private $priCompany;
	public $pubCompnay;

	public function setWorkDate($value)
	{
		$this->priWorkDate = $value;
	}

	public function getWorkDate()
	{
		return $this->priWorkDate;
	}

	public function setCompany($value)
	{
		$this->priCompany = $value;
	}

	public function getCompany()
	{
		return $this->priCompany;
	}


}

class Client
{
	function __construct()
	{
		$resumeA = new Resume('big bird');
		$resumeA->setPersonalInfo('male','29');
		$resumeA->setWorkExperience('1998-2000','XX company');

		$resumeB = $resumeA->clone();
		$resumeB->setWorkExperience('1998-2006','YY company');


		$resumeC = $resumeA->clone();
		$resumeC->setPersonalInfo('female','24');

		$resumeA->display();
		$resumeB->display();
		$resumeC->display();
	}
}

new Client;















