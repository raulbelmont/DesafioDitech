<?php
namespace App\model;

use App\model\ClassCRUD;

class ClassUser extends ClassCRUD
{

    #atributos da classe
	private $id;
	private $name;
	private $password;
	protected $table = 'user';

    #Inserindo usuário no sistema
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

    #criando login de usuário
    public function login($name, $password)
    {
        if ($this->userExists($name, $password)) {
            $user->userExists($name, $password);
            session_start();
            $_SESSION['isLogged'] = true;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            return true;
        }else{
            return false;
        }
    }

    #verificando se o usuário existe no banco de dados
    public function userExists($name, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE name = :name AND password = :password";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    #Getters and setters
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
