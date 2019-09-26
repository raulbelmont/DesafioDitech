<?php
namespace App\model;

use App\model\ClassCRUD;

class ClassReservation extends ClassCRUD
{
    #atributos da classe
	private $id;
	private $day;
	private $hour;
    private $roomId;
    private $userId;
	protected $table = 'reservation';

    #criando nova reserva
	public function insert()
	{
		$sql = "INSERT INTO $this->table (day, hour, roomId, userId) VALUES (:day, :hour, :roomId, :userId)";
		$stmt = ClassConnection::prepare($sql);
		$stmt->bindParam(':day', $this->day, \PDO::PARAM_STR);
		$stmt->bindParam(':hour', $this->hour, \PDO::PARAM_STR);
        $stmt->bindParam(':roomId', $this->roomId, \PDO::PARAM_INT);
        $stmt->bindParam(':userId', $this->userId, \PDO::PARAM_INT);
		return $stmt->execute();
	}

    public function update()
    {

    }

    #Método para verificar se a sala já está reservada
    public function isReserved($day, $hour, $roomId)
    {
        $sql = "SELECT * FROM $this->table WHERE day = :day AND hour = :hour AND roomId = :roomId";
        $stmt = ClassConnection::prepare($sql);
        $stmt->bindParam(":day", $day);
        $stmt->bindParam(":hour", $hour);
        $stmt->bindParam(":roomId", $roomId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    #Método que verifica se o usuário já possui reserva no horário desejado
    public function haveReservation($userId, $day, $hour)
    {
        $sql = "SELECT * FROM $this->table WHERE userId = :userId AND day = :day AND hour = :hour";
        $stmt = ClassConnection::prepare($sql);
        $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
        $stmt->bindParam(':day', $day, \PDO::PARAM_STR);
        $stmt->bindParam(':hour', $hour, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
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

    public function getRoomId()
    {
        return $this->roomId;
    }

    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;

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
