<?php namespace App\Controllers;

use App\Models\TipoDisposicionModel;

class TipoDisposicionController extends BaseController {
    
    public function index(){
        $tipodispo = new TipoDisposicionModel();
        $datos = $tipodispo->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('TipoDisposicion/index', $data);
    }
    
    public function crear(){
        $datos = [
            "TipoDisposicion" => $_POST['TipoDisposicion'],
        ];

        $tipodispo = new TipoDisposicionModel();
        $respuesta = $tipodispo->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/TipoDisposicion')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/TipoDisposicion')->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "TipoDisposicion" => $_POST['TipoDisposicion'],
        ];
        
        $tipodispo = new TipoDisposicionModel();
        $idTD = $_POST['idTipoDisposicion'];
        $respuesta = $tipodispo->actualizar($datos, $idTD);

        if ($respuesta) {
            return redirect()->to(base_url().'/TipoDisposicion')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/TipoDisposicion')->with('mensaje','3');
        }
    }

    public function obtener($idTD){
        $data = ["idTipoDisposicion" => $idTD];
		$tipodispo = new TipoDisposicionModel();
		$respuesta = $tipodispo->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('TipoDisposicion/actualizar', $datos);
    }

    public function eliminar($idTD){
        $tipodispo = new TipoDisposicionModel();
		$data = ["idTipoDisposicion" => $idTD];

		$respuesta = $tipodispo->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/TipoDisposicion')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/TipoDisposicion')->with('mensaje','5');
		}
    }
}

?>