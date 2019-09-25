<?php
namespace Src\classes;

class ClassBreadcrumb
{

	use \Src\traits\TraitUrlParser;

	#Cria os Breadcrumbs do site
	public function addBreadcrumb()
	{
		$Contador = count($this->parseUrl());

		echo "<a href='".DIRPAGE."'>home<a/>>";

		$ArrayLink[0] = "";
		for ($I=0; $I < $Contador; $I++) {

			$ArrayLink[0] .= $this->parseUrl()[$I]."/";

			echo "<a href='".DIRPAGE.$ArrayLink[0]."'>".$this->parseUrl()[$I]."<a/>";

			if ($I < $Contador - 1) {
				echo ">";
			}
		}
	}

}