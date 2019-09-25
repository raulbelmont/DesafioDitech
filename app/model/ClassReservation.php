<?php
namespace App\model;

use App\model\ClassCRUD;

class ClassReservation extends ClassCRUD
{

	private $id;
	private $day;
	private $hour;
    private $roomNumber;
    private $userId;
	protected $table = 'reservation';

	public function insert()
	{
		$sql = "INSERT INTO $this->table (day, hour, roomNumber, userId) VALUES (:day, :hour, :roomNumber, :userId)";
		$stmt = Conecta::prepare($sql);
		$stmt->bindParam(':day', $this->day, PDO::PARAM_STR);
		$stmt->bindParam(':hour', $this->hour, PDO::PARAM_STR);
        $stmt->bindParam(':roomNumber', $this->roomNumber, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $this->userId, PDO::PARAM_INT);
		return $stmt->execute();
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

    public function getDay()
    {
        return $this->day;
    }

    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function setHour($hour)
    {
        $this->hour = $hour;

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

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

}
