<?php namespace App\Controllers;

use App\Models\DisposicionModel;
use App\Models\Leyes;
use App\Libraries\Hash;

class DisposicionController extends BaseController{

    public function index(){
        $disposicion = new DisposicionModel();
        $datos = $disposicion->listar();

        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Disposicion/index', $data);
    }
       
    public function indexdispo($idLey){
        $Disposicionmdl = new DisposicionModel();
        $ley = new Leyes();
        $Consulta = ["idLey" => $idLey];
        $dbLey = $ley->ObtenerbyId($Consulta);
        $datos = $Disposicionmdl->ListarById($idLey);
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje,
            "idLeyes" => $idLey,
            "dbLeyes" => $dbLey,
        ];
        return view('Disposicion/index', $data);
    }
    
    public function crear(){
        $datos = [
            "NoDisposicion" => $_POST['NoDisposicion'],
            "ContenidoDisposicion" => $_POST['ContenidoDisposicion'],
            "idLey" => $_POST['idLey'],
            "idTipoDisposicion" => 1,
            "Activo" => 1,
            "Borrado" => 1,
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $disposicion = new DisposicionModel();
        $respuesta = $disposicion->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Disposicion/'.$_POST['idLey'])->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Disposicion/'.$_POST['idLey'])->with('mensaje','0');
		}
    }

    public function actualizar(){

        $datos = [
            "NoDisposicion" => $_POST['NoDisposicion'],
            "ContenidoDisposicion" => $_POST['ContenidoDisposicion'],
            "idLey" => $_POST['idLey'],
            "idTipoDisposicion" => $_POST['idTipoDisposicion'],
            "Activo" => 1,
            "Borrado" => 1,
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];
        
        $disposicion = new DisposicionModel();
        $idDisposicion = $_POST['idDisposicion'];
        $respuesta = $disposicion->actualizar($datos, $idDisposicion);

        if ($respuesta) {
            return redirect()->to(base_url().'/Disposicion/'.$_POST['idLey'])->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Disposicion/'.$_POST['idLey'])->with('mensaje','3');
        }
    }

    public function obtener($idDisposicion){
        $data = ["idDisposicion" => $idDisposicion];
		$disposicion = new DisposicionModel();
		$respuesta = $disposicion->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('Disposicion/actualizar', $datos);
    }

    public function eliminar($idDisposicion){
        $disposicion = new DisposicionModel();
		$data = ["idDisposicion" => $idDisposicion];

		$respuesta = $disposicion->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Disposicion')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Disposicion')->with('mensaje','5');
		}
    }
}

?>