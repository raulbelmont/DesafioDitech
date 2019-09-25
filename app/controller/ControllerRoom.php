<?php
namespace App\controller;

session_start();

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;
use App\model\ClassRoom;

class ControllerRoom extends ClassRender implements InterfaceView
{

	#atributos
	private $roomNumber;

	public function __construct()
	{
		if (isset($_SESSION['isLogged']) and $_SESSION['isLogged'] == true) {
			$this->setTitle("Salas");
			$this->setDescription("Sistema de fila virtual para uso de salas de reuniões");
			$this->setKeywords("");
			$this->setDir("salas");
			$this->renderLayout();
		}else{
			header("Location:".DIRPAGE."");
		}

	}

	#método para verificar parametros para cadastro de sala
	public function getParameters()
	{
		if (isset($_POST['roomNumber'])) {
			$this->setRoomNumber($_POST['roomNumber']);
			return true;
		}else{
			return false;
		}
	}

	public function registerRoom()
	{
		#verificando se os parametros para cadastro de sala estão setados
		if ($this->getParameters()) {
			$room = new ClassRoom();
			$room->setRoomNumber($this->roomNumber);
			#verificando se a sala já foi cadastrada
			if ($room->roomExists()) {
				echo "<script type='text/javascript'>alert('Essa sala já foi cadastrada!')</script>";
			#cadastrando sala
			}elseif ($room->insert()) {
				echo "<script type='text/javascript'>alert('Sala cadastrada com sucesso!')</script>";
			}else{
				echo "<script type='text/javascript'>alert('Erro ao cadastrar sala')</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Informe o número da sala')</script>";
		}
	}

	#getters and setters
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
