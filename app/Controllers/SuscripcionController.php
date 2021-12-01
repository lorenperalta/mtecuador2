<?php namespace App\Controllers;

use App\Models\SuscripcionModel;

class SuscripcionController extends BaseController{
    
    public function index(){
        $suscripcion = new SuscripcionModel();
        $datos = $suscripcion->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Administrador/Suscripcion/index', $data);
    }
    
    public function crear(){
        $datos = [
            "id_cliente" => $_POST['id_cliente'],
            "id_detalle_suscripcion" => $_POST['id_detalle_suscripcion'],
            "metodo_pago" => $_POST['metodo_pago'],
            "periodo_pago" => $_POST['periodo_pago'],
            "fecha_inicio" => $_POST['fecha_inicio'],
            "fecha_final" => $_POST['fecha_final'],
            "precio_renovacion" => $_POST['precio_renovacion'],
            "estado" => $_POST['estado'],
        ];

        $suscripcion = new SuscripcionModel();
        $respuesta = $suscripcion->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Suscripcion')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Suscripcion')->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "id_cliente" => $_POST['id_cliente'],
            "id_detalle_suscripcion" => $_POST['id_detalle_suscripcion'],
            "metodo_pago" => $_POST['metodo_pago'],
            "periodo_pago" => $_POST['periodo_pago'],
            "fecha_inicio" => $_POST['fecha_inicio'],
            "fecha_final" => $_POST['fecha_final'],
            "precio_renovacion" => $_POST['precio_renovacion'],
            "estado" => $_POST['estado'],
        ];
        
        $suscripcion = new SuscripcionModel();
        $idSuscripcion = $_POST['id'];
        $respuesta = $suscripcion->actualizar($datos, $idSuscripcion);

        if ($respuesta) {
            return redirect()->to(base_url().'/Suscripcion')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Suscripcion')->with('mensaje','3');
        }
    }

    public function obtener($idSuscripcion){
        $data = ["id" => $idSuscripcion];
		$suscripcion = new SuscripcionModel();
		$respuesta = $suscripcion->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('Suscripcion/actualizar', $datos);
    }

    public function eliminar($idSuscripcion){
        $suscripcion = new SuscripcionModel();
		$data = ["id" => $idSuscripcion];

		$respuesta = $suscripcion->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Suscripcion')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Suscripcion')->with('mensaje','5');
		}
    }
    
}
