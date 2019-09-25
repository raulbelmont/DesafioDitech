<?php
namespace App\controller;

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;

class ControllerRegister extends ClassRender implements InterfaceView
{

	public function __construct()
	{
		$this->setTitle("Cadastro");
		$this->setDescription("Cadastro de usuários no sistema");
		$this->setKeywords("");
		$this->setDir("cadastro");
		$this->renderLayout();
	}

}