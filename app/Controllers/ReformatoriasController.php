<?php namespace App\Controllers;

use App\Models\ReformatoriasModel;
use App\Models\Leyes;
use App\Libraries\Hash;

class ReformatoriasController extends BaseController{

    public function index(){
        $reformatoria = new ReformatoriasModel();
        $datos = $reformatoria->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Reformatorias/index', $data);
    }
       
    public function indexdispo($idLey){
        $reformatoria = new ReformatoriasModel();
        $ley = new Leyes();

        $Consulta = ["idLey" => $idLey];
        
        $dbLey = $ley->ObtenerbyId($Consulta);
        
        $datos = $reformatoria->ListarById($idLey);
        
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje,
            "idLeyes" => $idLey,
            "dbLeyes" => $dbLey,
        ];
        return view('Reformatorias/index', $data);
    }
    
    public function crear(){
        $datos = [
            "NoReformatoria" => $_POST['NoReformatoria'],
            "ResumenReformatoria" => $_POST['ResumenReformatoria'],
            "idRO" => $_POST['idRO'],
            "idLey" => $_POST['idLey'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $reformatoria = new ReformatoriasModel();
        $respuesta = $reformatoria->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Reformatorias/'.$_POST['idLey'])->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Reformatorias/'.$_POST['idLey'])->with('mensaje','0');
		}
    }

    public function actualizar(){

        $datos = [
            "NoReformatoria" => $_POST['NoReformatoria'],
            "ResumenReformatoria" => $_POST['ResumenReformatoria'],
            "idRO" => $_POST['idRO'],
            "idLey" => $_POST['idLey'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];
        
        $reformatoria = new ReformatoriasModel();
        $idDetalleCliente = $_POST['idReformatoria'];
        $respuesta = $reformatoria->actualizar($datos, $idDetalleCliente);

        if ($respuesta) {
            return redirect()->to(base_url().'/Reformatorias/'.$_POST['idLey'])->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Reformatorias/'.$_POST['idLey'])->with('mensaje','3');
        }
    }

    public function obtener($idReformatorias){
        $data = ["idReformatoria" => $idReformatorias];
		$reformatoria = new ReformatoriasModel();
		$respuesta = $reformatoria->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('Reformatorias/actualizar', $datos);
    }

    public function eliminar($IDReformatoria){
        $reformatoria = new ReformatoriasModel();
		$data = ["idReformatoria" => $IDReformatoria];

		$respuesta = $reformatoria->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Reformatorias')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Reformatorias')->with('mensaje','5');
		}
    }
}

?>