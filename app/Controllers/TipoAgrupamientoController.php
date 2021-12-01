<?php namespace App\Controllers;

use App\Models\TipoAgrupamientoModel;

class TipoAgrupamientoController extends BaseController {
    
    public function index(){
        $tap = new TipoAgrupamientoModel();
        $datos = $tap->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('TipoAgrupamiento/index', $data);
    }
    
    public function crear(){
        $datos = [
            "NombreTipoAgrup" => $_POST['NombreTipoAgrup'],
            "DescripcionTipoAgrup" => $_POST['DescripcionTipoAgrup'],
        ];

        $tap = new TipoAgrupamientoModel();
        $respuesta = $tap->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/TipoAgrupamiento')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/TipoAgrupamiento')->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "NombreTipoAgrup" => $_POST['NombreTipoAgrup'],
            "DescripcionTipoAgrup" => $_POST['DescripcionTipoAgrup'],
        ];
        
        $tap = new TipoAgrupamientoModel();
        $idTAP = $_POST['idTipoAgrupamiento'];
        $respuesta = $tap->actualizar($datos, $idTAP);

        if ($respuesta) {
            return redirect()->to(base_url().'/TipoAgrupamiento')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/TipoAgrupamiento')->with('mensaje','3');
        }
    }

    public function obtener($idTAP){
        $data = ["idTipoAgrupamiento" => $idTAP];
		$tap = new TipoAgrupamientoModel();
		$respuesta = $tap->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('TipoAgrupamiento/actualizar', $datos);
    }

    public function eliminar($idTAP){
        $tap = new TipoAgrupamientoModel();
		$data = ["idTipoAgrupamiento" => $idTAP];

		$respuesta = $tap->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/TipoAgrupamiento')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/TipoAgrupamiento')->with('mensaje','5');
		}
    }
}

?>