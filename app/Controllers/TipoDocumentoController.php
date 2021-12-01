<?php namespace App\Controllers;

use App\Models\TipoDocumentoModel;

class TipoDocumentoController extends BaseController {
    
    public function index(){
        $paragrafos = new TipoDocumentoModel();
        $datos = $paragrafos->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('TipoDocumento/index', $data);
    }
    
    public function crear(){
        $datos = [
            "NombreDoc" => $_POST['NombreDoc'],
            "Descripcion" => $_POST['Descripcion'],
        ];

        $paragrafos = new TipoDocumentoModel();
        $respuesta = $paragrafos->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/TipoDocumento')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/TipoDocumento')->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "NombreDoc" => $_POST['NombreDoc'],
            "Descripcion" => $_POST['Descripcion'],
        ];
        
        $paragrafos = new TipoDocumentoModel();
        $idTipoDoc = $_POST['idTipoDoc'];
        $respuesta = $paragrafos->actualizar($datos, $idTipoDoc);

        if ($respuesta) {
            return redirect()->to(base_url().'/TipoDocumento')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/TipoDocumento')->with('mensaje','3');
        }
    }

    public function obtener($idTipoDoc){
        $data = ["idTipoDoc" => $idTipoDoc];
		$paragrafos = new TipoDocumentoModel();
		$respuesta = $paragrafos->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('TipoDocumento/actualizar', $datos);
    }

    public function eliminar($idTipoDoc){
        $paragrafos = new TipoDocumentoModel();
		$data = ["idTipoDoc" => $idTipoDoc];

		$respuesta = $paragrafos->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/TipoDocumento')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/TipoDocumento')->with('mensaje','5');
		}
    }
}

?>