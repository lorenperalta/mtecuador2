<?php

namespace App\Controllers;
use App\Models\AgrupMenu;
class Home extends BaseController
{
	public function index()
	{
		$Menu = new AgrupMenu();
		$data= $Menu->Listar();
		$menuCliente =[ "MenuDashboardCliente"=>$data,

		];
			$session = session();
			$session->set($menuCliente);
		return view('welcome_message');
	}
}
