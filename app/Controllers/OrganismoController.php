<?php namespace App\Controllers;

use App\Models\OrganismoModel;

class OrganismoController extends BaseController {
    
    public function index(){
        $titulos = new OrganismoModel();
        $datos = $titulos->ListarTitulos();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Organismo/index', $data);
    }
    
    public function crear(){
        $datos = [
            "NombreOrganismo" => $_POST['NombreOrganismo'],
            "DescripcionOrganismo" => $_POST['DescripcionOrganismo'],
            "AbrevOrganismo" => $_POST['AbrevOrganismo'],
            "Borrado" => $_POST['Borrado'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $titulos = new OrganismoModel();
        $respuesta = $titulos->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Organismo')->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Organismo')->with('mensaje','0');
		}
    }

    public function actualizar(){

        $datos = [
            "NombreOrganismo" => $_POST['NombreOrganismo'],
            "DescripcionOrganismo" => $_POST['DescripcionOrganismo'],
            "AbrevOrganismo" => $_POST['AbrevOrganismo'],
            "Borrado" => $_POST['Borrado'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];
        
        $Crud = new OrganismoModel();
        $idTitulo = $_POST['idOrganismo'];
        $respuesta = $Crud->actualizar($datos, $idTitulo);

        if ($respuesta) {
            return redirect()->to(base_url().'/Organismo')->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Organismo')->with('mensaje','3');
        }
    }

    public function obtenerTitulos($idTitulo){
        $data = ["idOrganismo" => $idTitulo];
		$Crud = new OrganismoModel();
		$respuesta = $Crud->obtenerTitulos($data);

		$datos = ["datos" => $respuesta];

		return view('Organismo/actualizar', $datos);
    }

    public function eliminar($idTitulo){
        $titulo = new OrganismoModel();
		$data = ["idOrganismo" => $idTitulo];

		$respuesta = $titulo->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Organismo')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Organismo')->with('mensaje','5');
		}
    }
}

?>