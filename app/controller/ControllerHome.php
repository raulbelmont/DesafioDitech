<?php
namespace App\controller;

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;
use App\model\ClassUser;

class ControllerHome extends ClassRender implements InterfaceView
{

	#atributos para login
	private $name;
	private $password;

	public function __construct()
	{
		$this->setTitle("Página Inicial");
		$this->setDescription("Sistema de fila virtual para uso de salas de reuniões");
		$this->setKeywords("");
		$this->setDir("home");
		$this->renderLayout();
	}

	#pega parâmetros do formulário para login
	public function getParameters()
	{
		if (isset($_POST['name']) && isset($_POST['password'])) {
			$this->name = $_POST['name'];
			$this->password = $this->encryptPassword($_POST['password']);
			return true;
		}else{
			return false;
		}
	}

	#criptografa senha
	public function encryptPassword($password)
	{
		$encryptedPassword = md5($password);
		return $encryptedPassword;
	}

	#função para fazer login
	public function getLogin(){
		#setando parametros para login
		if ($this->getParameters()) {
			$user = new ClassUser();
			$user->setName($this->name);
			$user->setPassword($this->password);
			#fazendo login
			if ($user->login()) {
				header(DIRPAGE."dashboard");
			}else{
				echo "<script type='text/javascript'>alert('Erro ao logar!')</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Informe nome e senha!')</script>";
		}
	}

	}

	#getters and setters

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

}
