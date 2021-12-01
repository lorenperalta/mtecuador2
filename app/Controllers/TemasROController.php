<?php namespace App\Controllers;

use App\Models\TemasROModel;

class TemasROController extends BaseController{

    public function index(){
        $ro = new TemasROModel();
        $datos = $ro->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('TemasRO/index', $data);
    }
    
    public function crear(){
        $datos = [
            "idRO" => $_POST['idRO'],
            "NoTema" => $_POST['NoTema'],
            "idFuncion" => $_POST['idFuncion'],
            "idOrganismo" => $_POST['idOrganismo'],
            "idCategoria" => $_POST['idCategoria'],
            "DetalleTema" => $_POST['DetalleTema'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $ro = new TemasROModel();
        $respuesta = $ro->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/TemasRO')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/TemasRO')->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "idRO" => $_POST['idRO'],
            "NoTema" => $_POST['NoTema'],
            "idFuncion" => $_POST['idFuncion'],
            "idOrganismo" => $_POST['idOrganismo'],
            "idCategoria" => $_POST['idCategoria'],
            "DetalleTema" => $_POST['DetalleTema'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];
        
        $ro = new TemasROModel();
        $idTemasRO = $_POST['idTema'];
        $respuesta = $ro->actualizar($datos, $idTemasRO);

        if ($respuesta) {
            return redirect()->to(base_url().'/TemasRO')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/TemasRO')->with('mensaje','3');
        }
    }

    public function obtener($idTemasRO){
        $data = ["idTema" => $idTemasRO];
		$ro = new TemasROModel();
		$respuesta = $ro->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('TemasRO/actualizar', $datos);
    }

    public function eliminar($idTemasRO){
        $ro = new TemasROModel();
		$data = ["idTema" => $idTemasRO];

		$respuesta = $ro->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/TemasRO')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/TemasRO')->with('mensaje','5');
		}
    }
}

?>