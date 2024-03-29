<?php
namespace Src\classes;

use Src\traits\TraitUrlParser;

class ClassRoutes
{

	use TraitUrlParser;

	private $Rota;

	#Método de retorno da rota
	public function getRota()
	{
		$Url = $this->parseUrl();
		$I=$Url[0];

		$this -> Rota=array(
			""=>"ControllerHome",
			"home"=>"ControllerHome",
			"cadastro"=>"ControllerRegister",
			"logout"=>"ControllerLogout",
			"dashboard"=>"ControllerDashboard",
			"salas"=>"ControllerRoom"
		);

		if (array_key_exists($I,$this->Rota)) {
			if (file_exists(DIRREQ."app/controller/{$this->Rota[$I]}.php")) {
				return $this->Rota[$I];
			}else{
				return "ControllerHome";
			}
		}else{
			return "Controller404";
		}
	}

}
