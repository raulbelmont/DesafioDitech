<?php
namespace App\controller;

class Controller404
{

	function __construct()
	{
		echo "<h1>Erro 404</h1>";
		echo "<br/>";
		echo "<h2>Página não encontrada</h2>";
		echo "<a href={DIRPAGE}">Voltar pro início</a>";
	}
}