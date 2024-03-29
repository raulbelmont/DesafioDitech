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

	#busca o número de uma sala específica
	public function getRoomNumber($roomId){
		$room = new ClassRoom();
		$room = $room->select($roomId);
		return $room->roomNumber;
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

	#busca as reservas de um usuário
	public function getUserReservation()
	{
		$userId = $_SESSION['user_id'];
		$reservation = new ClassReservation();
		return $reservation->selectAllUserReservation($userId);
	}

	#checa se existe reserva para o dia e horário em uma sala de reunião
	public function checkReserve($day, $hour, $roomId)
	{
		$reservation = new ClassReservation();
		#checa se existe reserva
		if ($reservation->isReserved($day, $hour, $roomId)) {
			#checa se a reserva é do usuário que está logado
			$reserve = $reservation->isReserved($day, $hour, $roomId);
			if(($reserve[0]->userId) == ($_SESSION['user_id'])){
				echo"<p class='text-danger m-0 p-0'>Você reservou</p><br/>";
				echo"<a class='p-0 m-0' href='".DIRPAGE."dashboard/cancelReservation/".$reserve[0]->id."'>Cancelar</a>";
			}else{
				echo"<p class='text-danger'>Reservado</p><br/>";
			}
		}else{
			echo"<a class='text-success' href='".DIRPAGE."dashboard/reserve/".$day."/".$hour."/".$roomId."'>Reservar</a>";
		}
	}

	#metodo para fazer reserva de horário
	public function reserve($day, $hour, $roomId)
	{
		$reservation = new ClassReservation();
		$reservation->setDay($day);
		$reservation->setHour($hour);
		$reservation->setRoomId($roomId);
		$reservation->setUserId($_SESSION['user_id']);
		#verificando se o horário está vago
		if ($reservation->isReserved($day, $hour, $roomId)) {
			echo"<script type='text/javascript'>alert('Ops! Alguém reservou esse horário');
			window.location = '".DIRPAGE."dashboard'; </script>";
		#verificando se o usuário já possui uma reserva nesse horário
		}elseif ($reservation->haveReservation($_SESSION['user_id'], $day, $hour)) {
			echo"<script type='text/javascript'>alert('Você já reservou outra sala nesse horário!');
			window.location = '".DIRPAGE."dashboard'; </script>";
		#criando reserva
		}elseif ($reservation->insert()) {
			echo"<script type='text/javascript'>alert('Horário reservado com sucesso!');
			window.location = '".DIRPAGE."dashboard'</script>";
		}else{
			echo"<script type='text/javascript'>alert('Erro ao reservar sala!')</script>";
		}

	}

	#cancelar reserva
	public function cancelReservation($id)
	{
		$reservation = new ClassReservation();
		#verificando existência da reserva
		if ($reservation->select($id)) {
			#excluindo a reserva
			if ($reservation->delete($id)) {
				echo"<script type='text/javascript'>alert('Reserva cancelada!');
			window.location = '".DIRPAGE."dashboard'</script>";
				// $this->goTo('dashboard');
			}else{
				echo"<script type='text/javascript'>alert('Erro ao cancelar reserva!')</script>";
			}
		}else{
			echo"<script type='text/javascript'>alert('Essa reserva já foi cancelada!')</script>";
		}
	}

	#getters and setters
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