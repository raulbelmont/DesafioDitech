<?php
namespace App\controller;

session_start();

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;

class ControllerDashboard extends ClassRender implements InterfaceView
{

	public function __construct()
	{
		if (isset($_SESSION['isLogged']) and $_SESSION['isLogged'] == true) {
			$this->setTitle("Página Inicial");
			$this->setDescription("Sistema de fila virtual para uso de salas de reuniões");
			$this->setKeywords("");
			$this->setDir("dashboard");
			$this->renderLayout();
		}else{
			header("Location:".DIRPAGE."");
		}

	}

}
