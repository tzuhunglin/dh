<?php
Interface IDepartment
{
	public function insert($department);
	public function getDepartment($id);
}

Interface IUser
{
	public function insert($department);
	public function getUser($id);
}

class SqlServerDepartment implements IDepartment
{
	public function insert($department)
	{
		echo " add a record to department in Sql server \n";
	}

	public function getDepartment($id)
	{
		echo " get a record from department in Sql server \n";
	}
}

class SqlServerUser implements IUser
{
	public function insert($user)
	{
		echo " add a record to user in Sql server \n";
	}

	public function getUser($id)
	{
		echo " get a record from user in Sql server \n";
	}
}


class AccessDepartment implements IDepartment
{
	public function insert($department)
	{
		echo " add a record to department in Access server \n";
	}

	public function getDepartment($id)
	{
		echo " get a record from department in Access server \n";
	}
}

class AccessUser implements IUser
{
	public function insert($user)
	{
		echo " add a record to user in Access server \n";
	}

	public function getUser($id)
	{
		echo " get a record from user in Access server \n";
	}
}

Interface IFactory
{
	public function createUser();
	public function createDepartment();
}

class SqlServerFactory implements IFactory
{
	public function createUser()
	{
		return new SqlServerUser;
	}

	public function createDepartment()
	{
		return new SqlServerDepartment;
	}
}

class AccessFactory implements IFactory
{
	public function createUser()
	{
		return new AccessUser();
	}

	public function createDepartment()
	{
		return new AccessDepartment;
	}
}

class User
{
	private $id;
	private $name;

	public function getId()
	{
		return $this->id;
	}


	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}


	public function setName($name)
	{
		$this->name = $name;
	}
}

class Department
{
	private $id;
	private $name;

	public function getId()
	{
		return $this->id;
	}


	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}


	public function setName($name)
	{
		$this->name = $name;
	}
}

class Client
{
	function __construct()
	{
		$user = new User;
		$department = new Department;
		$factory = new SqlServerFactory;

		// $factory = new AccessFactory;
		$iu = $factory->createUser();

		$iu->insert($user);
		$iu->getUser(1);

		$id = $factory->createDepartment();
		$id->insert($dept);
		$id->getDepartment(1);
	}
}

new Client;












