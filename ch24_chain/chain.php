<?php
abstract class Manager
{
	protected $superior;
	protected $name;
	function __construct($name)
	{
		$this->name = $name;
	}

	public function setSuperior($superior)
	{
		$this->superior = $superior;
	}

	abstract public function requestApplications($request);
}

class CommonManager extends Manager
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function requestApplications($request)
	{
		if($request->getRequestType() == "off" && $request->getRequestNum() <=2)
		{
			echo $request->getRequestNum()." ".$request->getRequestContent()." num: ".$request->getRequestNum()." allowed!";
		}
		else
		{
			if($this->superior != null)
			{
				$this->superior->requestApplications($request);
			}
		}
	}
}

class Majordomo extends Manager
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function requestApplications($request)
	{
		if($request->getRequestType() == "off" && $request->getRequestNum() <=5
	)
		{
			echo $request->getRequestNum()." ".$request->getRequestContent()." num: ".$request->getRequestNum()." allowed!";
		}
		else
		{
			if($this->superior != null)
			{
				$this->superior->requestApplications($request);
			}
		}
	}
}

class GeneralManager extends Manager
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function requestApplications($request)
	{
		if($request->getRequestType() == "off")
		{
			echo $request->name." ".$request->getRequestContent()." num: ".$request->getRequestNum()." allowed!";
		}
		elseif($request->getRequestType() == "salary"&&$request->getRequestNum()<=500)
		{
			echo $request->name." ".$request->getRequestContent()." num: ".$request->getRequestNum()." allowed!";
		}
		elseif($request->getRequestType() == "salary"&&$request->getRequestNum()>500)
		{
			echo $request->name." ".$request->getRequestContent()." num: ".$request->getRequestNum()." not allowed!";
		}
	}
}

class Request
{
	private $requestType;
	private $requestContent;
	private $requestNum;

	public function setRequestType($type)
	{
		$this->requestType = $type;
	}

	public function getRequestType()
	{
		return $this->requestType;
	}

	public function setRequestContent($content)
	{
		$this->requestContent = $content;
	}

	public function getRequestContent()
	{
		return $this->requestContent;
	}

	public function setRequestNum($num)
	{
		$this->requestNum = $num;
	}

	public function getRequestNum()
	{
		return $this->requestNum;
	}


}
class Client
{
	function __construct()
	{
		$jinli = new CommonManager('jinli');
		$zongjian = new Majordomo('zongjian');
		$zongjinli = new GeneralManager('zongjinli');
		
		$jinli->setSuperior($zongjian);
		$zongjian->setSuperior($zongjinli);


		$request = new Request();
		$request->setRequestType('off');
		$request->setRequestContent(" xiaochai ask day off\n");
		$request->setRequestNum(1);
		$jinli->requestApplications($request);

		$request2 = new Request();
		$request2->setRequestType('off');
		$request2->setRequestContent(" xiaochai ask day off\n");
		$request2->setRequestNum(4);
		$jinli->requestApplications($request2);

		$request3 = new Request();
		$request3->setRequestType('salary');
		$request3->setRequestContent(" xiaochai ask salary raise\n");
		$request3->setRequestNum(500);
		$jinli->requestApplications($request3);

		$request4 = new Request();
		$request4->setRequestType('salary');
		$request4->setRequestContent(" xiaochai ask salary raise\n");
		$request4->setRequestNum(800);
		$jinli->requestApplications($request4);



	}
}

new Client;














