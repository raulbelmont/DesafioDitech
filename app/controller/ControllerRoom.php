<?php
namespace App\controller;

session_start();

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;
use App\model\ClassRoom;

class ControllerRoom extends ClassRender implements InterfaceView
{

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

}
