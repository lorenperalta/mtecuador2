<?php namespace App\Controllers;

use App\Models\JuriprudenciaModel;
use App\Models\Leyes;
use App\Libraries\Hash;

class JuriprudenciaController extends BaseController{
       
    public function indexdispo($idLey){
        $juriprudencia = new JuriprudenciaModel();
        $ley = new Leyes();

        $Consulta = ["idLey" => $idLey];
        
        $dbLey = $ley->ObtenerbyId($Consulta);
        
        $datos = $juriprudencia->ListarById($idLey);
        
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje,
            "idLeyes" => $idLey,
            "dbLeyes" => $dbLey,
        ];
        return view('Juriprudencias/index', $data);
    }
    
    public function crear(){
        $datos = [
            "ResumenJurisprudencia" => $_POST['ResumenJurisprudencia'],
            "ContenidoJurisprudencia" => $_POST['ContenidoJurisprudencia'],
            "Borrado" => 1,
            "idLey" => $_POST['idLey'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $juriprudencia = new JuriprudenciaModel();
        $respuesta = $juriprudencia->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Juriprudencias/'.$_POST['idLey'])->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Juriprudencias/'.$_POST['idLey'])->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "ResumenJurisprudencia" => $_POST['ResumenJurisprudencia'],
            "ContenidoJurisprudencia" => $_POST['ContenidoJurisprudencia'],
            "Borrado" => 1,
            "idLey" => $_POST['idLey'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];
        
        $juriprudencia = new JuriprudenciaModel();
        $idJuri = $_POST['idJurisprudencia'];
        $respuesta = $juriprudencia->actualizar($datos, $idJuri);

        if ($respuesta) {
            return redirect()->to(base_url().'/Juriprudencias/'.$_POST['idLey'])->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Juriprudencias/'.$_POST['idLey'])->with('mensaje','3');
        }
    }

    public function obtener($idJuri){
        $data = ["idJurisprudencia" => $idJuri];
		$juriprudencia = new JuriprudenciaModel();
		$respuesta = $juriprudencia->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('Juriprudencias/actualizar', $datos);
    }

    public function eliminar($idJuri){
        $reformatoria = new JuriprudenciaModel();
		$data = ["idJurisprudencia" => $idJuri];

		$respuesta = $reformatoria->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Juriprudencias')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Juriprudencias')->with('mensaje','5');
		}
    }
}

?>