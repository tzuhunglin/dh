<?php
abstract class Flyweight
{
	public abstract function operation($extrinsicstate);
}

class ConcreteFlyweight extends Flyweight
{
	public function operation($extrinsicstate)
	{
		echo "ConcreteFlyweight: ".$extrinsicstate."\n";
	}
}

class UnsharedConcreteFlyweight extends Flyweight
{
	public function operation($extrinsicstate)
	{
		echo "UnsharedConcreteFlyweight: ".$extrinsicstate."\n";
	}
}

class FlyweightFactory
{
	private $flyweights = array();

	function __construct()
	{
		$this->flyweights['X'] = new ConcreteFlyweight;
		$this->flyweights['Y'] = new ConcreteFlyweight;
		$this->flyweights['Z'] = new ConcreteFlyweight;		
	}

	public function getFlyweight($key)
	{
		return $this->flyweights[$key];
	}
}

class Client
{
	function __construct()
	{
		$extrinsicstate = 22;

		$f = new FlyweightFactory;
		$fx = $f->getFlyweight("X");
		$fx->operation(--$extrinsicstate);

		$fy = $f->getFlyweight("Y");
		$fy->operation(--$extrinsicstate);

		$fz = $f->getFlyweight("Z");
		$fz->operation(--$extrinsicstate);

		$uf = new UnsharedConcreteFlyweight;
		$uf->operation(--$extrinsicstate);
		$fx->operation(--$extrinsicstate);
		
	}
}

new Client;
















