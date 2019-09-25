<?php
namespace App\model;

use App\model\ClassCRUD;

class User extends ClassCRUD
{
    #atributos da classe
	private $id;
	private $roomNumber;
	protected $table = 'room';

    #inserindo nova sala
	public function insert()
	{
		$sql = "INSERT INTO $this->table (roomNumber) VALUES (:roomNumber)";
		$stmt = Conecta::prepare($sql);
		$stmt->bindParam(':roomNumber', $this->roomNumber, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function update()
	{

	}

    #verifica se a sala que irá ser cadastrada já existe
    public function roomExists($roomNumber);
    {
        $sql = "SELECT * FROM $this->table WHERE roomNumber = :roomNumber";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(":roomNumber", $roomNumber, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    #getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

}
