<?php
namespace App\controller;

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;

class ControllerHome extends ClassRender implements InterfaceView
{

	public function __construct()
	{
		$this->setTitle("Página Inicial");
		$this->setDescription("Sistema de fila virtual para uso de salas de reuniões");
		$this->setKeywords("");
		$this->setDir("home");
		$this->renderLayout();
	}

}