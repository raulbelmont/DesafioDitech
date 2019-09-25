<?php
namespace App\controller;

session_start();

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;
use App\model\ClassReservation;

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

	public function getParameter()
	{
		if (isset($_POST['day'])) {
			$this->setDay($_POST['day']);
		}
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
