<?php
namespace App\model;

use App\model\ClassCRUD;

class ClassUser extends ClassCRUD
{

	private $id;
	private $name;
	private $password;
	protected $table = 'user';

	public function insert()
	{
		$sql = "INSERT INTO $this->table (name, password) VALUES (:name, :password)";
		$stmt = Conecta::prepare($sql);
		$stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
		$stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
		return $stmt->execute();
	}

	public function update()
	{

	}

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

}
