<?php
class User
{
	private $name;
	function __construct($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

abstract class WebSite
{
	abstract public function use($user); 
}

class ConcreteWebSite extends WebSite
{
	private $name = '';
	function __construct($name)
	{
		$this->name = $name;
	}

	public function use($user)
	{
		// echo "<pre>"; print_r($user);exit;
		echo "web category: ".$this->name." - user: ".$user->getName()."\n";
	}
}

class WebSiteFactory
{
	private $flyweights = array();

	public function getWebSitCategory($key)
	{
		if(!$this->flyweights[$key])
		{
			$this->flyweights[$key] = new ConcreteWebSite($key);
		}

		return $this->flyweights[$key];
	}

	public function getWebSiteCount()
	{
		return count($this->flyweights);
	}
}

class Client
{
	function __construct()
	{
		$f = new WebSiteFactory;

		$fx = $f->getWebSitCategory("product display");
		$fx->use(new User("xiao chai"));

		$fy = $f->getWebSitCategory("product display");
		$fy->use(new User("big bird"));


		$fz = $f->getWebSitCategory("product display");
		$fz->use(new User("jiaojiao"));


		$fl = $f->getWebSitCategory("blog");
		$fl->use(new User("old boy"));

		$fm = $f->getWebSitCategory("blog");
		$fm->use(new User("six gods"));

		$fn = $f->getWebSitCategory("blog");
		$fn->use(new User("bad people"));

		echo $f->getWebSiteCount();

	}
}

new Client;
























