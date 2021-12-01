<?php namespace App\Controllers;

use App\Models\LeyesAgrupamientoModel;

class LeyesAgrupamientoController extends BaseController {
    
    public function index(){
        $leyesagrup = new LeyesAgrupamientoModel();
        $datos = $leyesagrup->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('LeyesAgrupamiento/index', $data);
    }
    
    public function crear(){
        $datos = [
            "idLey" => $_POST['idLey'],
            "idAgrupamiento" => $_POST['idAgrupamiento'],
            "idUsuarioCreo" => 1,
        ];

        $leyesagrup = new LeyesAgrupamientoModel();
        $respuesta = $leyesagrup->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/LeyesAgrupamiento')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/LeyesAgrupamiento')->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "idLey" => $_POST['idLey'],
            "idAgrupamiento" => $_POST['idAgrupamiento'],
            "idUsuarioCreo" => 1,
        ];
        
        $leyesagrup = new LeyesAgrupamientoModel();
        $idLeyesAgrup = $_POST['idLeyGrupo'];
        $respuesta = $leyesagrup->actualizar($datos, $idLeyesAgrup);

        if ($respuesta) {
            return redirect()->to(base_url().'/LeyesAgrupamiento')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/LeyesAgrupamiento')->with('mensaje','3');
        }
    }

    public function obtener($idLeyesAgrup){
        $data = ["idLeyGrupo" => $idLeyesAgrup];
		$leyesagrup = new LeyesAgrupamientoModel();
		$respuesta = $leyesagrup->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('LeyesAgrupamiento/actualizar', $datos);
    }

    public function eliminar($idLeyesAgrup){
        $leyesagrup = new LeyesAgrupamientoModel();
		$data = ["idLeyGrupo" => $idLeyesAgrup];

		$respuesta = $leyesagrup->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/LeyesAgrupamiento')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/LeyesAgrupamiento')->with('mensaje','5');
		}
    }
}

?>