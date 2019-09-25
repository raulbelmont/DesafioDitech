<?php
namespace App\controller;

class ControllerLogout
{
	public function __construct()
	{
		if (!session_id()){
		session_start();
	    session_unset();
	    session_destroy();
	    header(DIRPAGE."home");
		}
	}
}