<?php
namespace App\controller;

use Src\classes\ClassRender;
use Src\interfaces\InterfaceView;
use App\model\ClassUser;

class ControllerRegister extends ClassRender implements InterfaceView
{
	private $name;
	private $password;

	public function __construct()
	{
		$this->setTitle("Cadastro");
		$this->setDescription("Cadastro de usuários no sistema");
		$this->setKeywords("");
		$this->setDir("cadastro");
		$this->renderLayout();
	}

	#pega parâmetros do formulário para cadastro
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

	#realiza registro do usuário
	public function register()
	{
		#setando parametros para insercao
		if ($this->getParameters()) {
			$user = new ClassUser();
			$user->setName($this->name);
			$user->setPassword($this->password);
			#verificando se o usuário já existe
			if ($user->userExists()) {
				echo "<script type='text/javascript'>alert('Esse usuário já existe!')</script>";
			#inserindo usuário
			}elseif ($user->insert()) {
				echo "<script type='text/javascript'>alert('Cadastrado com sucesso!')</script>";
			}else{
				echo "<script type='text/javascript'>alert('Erro ao inserir')</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Informe nome e senha!')</script>";
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
