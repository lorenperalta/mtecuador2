<?php

namespace App\Controllers;

use App\Models\Usuario;

class LogindmController extends BaseController
{
    public function index()
    {
        return view('Administrador/Loginadm/index');
    }
    public function login()
    {
        $usuario = $this->request->getPost('Usuario');
        $password = $this->request->getPost('Password');
        $Usuario = new Usuario();

        $datos = $Usuario->login(['Usuario' => $usuario]);
        if (count($datos) > 0 && password_verify($password, $datos[0]['Password'])) {
            $data = [
                "usuario" => $datos[0]['Usuario'],
                "Nombre" => $datos[0]['Nombre'],
                "Roll" => $datos[0]['Roll'],
            ];
            $_SESSION['tipo'] = "admin";
            $session = session();
            $session->set($data);
            $login = session();
            $login->set(["admin" => "tres"]);
            return redirect()->to(base_url() . '/Usuario');

        } else {
            return redirect()->to(base_url() . '/adm');
        }
    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
