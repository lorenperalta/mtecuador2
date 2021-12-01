<?php namespace App\Controllers;
 use App\Models\Usuario;
 use App\Libraries\Hash;
class UsuarioController extends BaseController{
    public function index(){
        $usuario = new Usuario();
        $datos=$usuario->Listar();
        $data =[
            "datos" => $datos
        ];
         return view('Usuario/index',$data);
    }
    public function insertar(){
       
        $datos =[
            "Nombre"        => $_POST['Nombre'],
            "Apellidos"     => $_POST['Apellidos'],
            "Direccion"     => $_POST['Direccion'],
            "Usuario"       => $_POST['Usuario'],
            "Password"      => Hash::make($_POST['Password']),
            "Roll"          => $_POST['Roll']
           
        ];
        $usuario = new Usuario();
        $respuesta= $usuario->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Usuario');

        }else{
            return redirect()->to(base_url().'/Usuario');

        }
        
    }
    public function editar($id){
        $data = ["id" => $id];
		$usuario = new Usuario();
		$respuesta = $usuario->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('Usuario/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "Nombre"        => $_POST['Nombre'],
            "Apellidos"     => $_POST['Apellidos'],
            "Direccion"     => $_POST['Direccion'],
            "Usuario"       => $_POST['Usuario'],
            "Password"      => $_POST['Password'],
            "Roll"          => $_POST['Roll']
				];
		$id = $_POST['id'];

		$usuario = new Usuario();

		$respuesta = $usuario->actualizar($datos, $id);

		if ($respuesta) {
			return redirect()->to(base_url().'/Usuario')->with('mensaje','2');
		} else {
			return redirect()->to(base_url().'/Usuario')->with('mensaje','3');
		}
	}
}

?>