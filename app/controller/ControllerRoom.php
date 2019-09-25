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
				header("Refresh: 0; url=".DIRPAGE."salas");
			}else{
				echo "<script type='text/javascript'>alert('Erro ao cadastrar sala')</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Informe o número da sala')</script>";
		}
	}

	#funcao para exibir salas já cadastradas
	public function selectRooms()
	{
		$room = new ClassRoom();
		echo "
		  <table class='table col-10'>
		  <thead class='thead-dark'>
		    <tr class='font-weight-bold'>
		      <th>Sala</th>
		      <th>Número</th>
		      <th>Ações</th>
		    </tr>
		  </thead>
		  <tbody>";
		foreach ($room->selectAll() as $key => $value){
			echo  "<tr> <td>Sala de Reuniões</td> <td>Sala Nº ". $value->roomNumber."</td>
			 <td><a href='".DIRPAGE."salas/deleteRoom/".$value->id."'>Excluir</a></td></tr>";
		}
		echo "</tbody></table>";
	}

	#funcao para deletar salas
	public function deleteRoom($id){
		$room = new ClassRoom();
		if ($room->delete($id)) {
			echo "<script type='text/javascript'>alert('Excluida com sucesso!')</script>";
			header("Refresh: 0; url=".DIRPAGE."salas");
		}else{
			echo "<script type='text/javascript'>alert('Erro ao excluir! Tente novamente.')</script>";
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
