<?php

namespace App\Controllers;

use App\Models\DetalleClienteModel;

class LoginController extends BaseController
{

	public function ingresar()
	{
		return view('Administrador/Login/ingresar');
	}

	public function login()
	{

		$usuario = $this->request->getPost('usuario');
		$contraseña = $this->request->getPost('contraseña');
		$Usuario = new DetalleClienteModel();

		$datosUsuario = $Usuario->obtenerDatos(['usuario' => $usuario]);

		if (
			count($datosUsuario) > 0 &&
			password_verify($contraseña, $datosUsuario[0]['contraseña'])
		) {

			$data = [
				"usuario" => $datosUsuario[0]['usuario'],
				"estado" => $datosUsuario[0]['estado']
			];

			$session = session();
			$session->set($data);

			return redirect()->to(base_url('/'));
		} else {
			return redirect()->to(base_url('/Login/ingresar'));
		}
	}

	public function salir()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/Login/ingresar'));
	}
}
