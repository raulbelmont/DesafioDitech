<?php
namespace App\model;

use App\model\ClassCRUD;

class User extends ClassCRUD
{

	private $id;
	private $roomNumber;
	protected $table = 'room';

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
