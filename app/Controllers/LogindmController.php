<?php namespace App\Controllers;
use App\Models\Usuario;
class LogindmController extends BaseController{
    public function index(){
        return view('Administrador/Loginadm/index');
    }
    public function login(){
        $usuario=$this->request->getPost('usuario');
        $Password=$this->request->getPost('Password');
        $usuarios = new Usuario();
        $datos=$usuarios->login(['Usuario' => $usuario] );
        if(count($datos)>0 && Password_verify($Password,$datos[0]['Password']) ){
            $data = [
                "usuario" =>$datos[0]['Usuario'],
                "Nombre" =>$datos[0]['Nombre'],
                "Roll" =>$datos[0]['Roll'],
            ];
            $session = session();
			$session->set($data);
            $login=session();
            $login->set(["admin" =>"tres"]);
            return redirect()->to(base_url().'Usuario');
            

        }else{
            return redirect()->to(base_url().'/adm');

        }
    }
    
}

?>