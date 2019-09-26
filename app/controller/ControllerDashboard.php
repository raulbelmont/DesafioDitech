<?php
namespace App\controller;

session_start();

date_default_timezone_set('America/Sao_Paulo');

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;
use App\model\ClassReservation;
use App\model\ClassRoom;

class ControllerDashboard extends ClassRender implements InterfaceView
{
	#atributos
	private $day;

	public function __construct()
	{
		if (isset($_SESSION['isLogged']) and $_SESSION['isLogged'] == true) {
			$this->setTitle("Dashboard");
			$this->setDescription("Sistema de fila virtual para uso de salas de reuniões");
			$this->setKeywords("");
			$this->setDir("dashboard");
			$this->renderLayout();
		}else{
			header("Location:".DIRPAGE."");
		}

	}

	#busca as salas
	public function getRooms()
	{
		$room = new ClassRoom();
		$rooms = $room->selectAll();
		return $rooms;
	}

	#pega parametro dia para buscar reservas
	public function getParameterDay()
	{
		if (isset($_POST['day'])) {
			$this->setDay($_POST['day']);
			return $this->getDay();
		}else{
			$this->setDay(date('Y-m-d'));
			return $this->getDay();
		}
	}

	#checa se existe reserva para o dia e horário em uma sala de reunião
	public function checkReserve($day, $hour, $roomId)
	{
		$reservation = new ClassReservation();
		$result = $reservation->isReserved($day, $hour, $roomId);
		var_dump($result);
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
}
