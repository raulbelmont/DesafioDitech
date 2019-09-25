<?php
namespace App\model;

use App\model\CRUD;

class User extends CRUD
{

	private $id;
	private $name;
	private $password;
	protected $table = 'user';

	public function insert()
	{
		$sql = "INSERT INTO $this->table (name, password) VALUES (:name, :password)";
	}

	public function update()
	{

	}

}
