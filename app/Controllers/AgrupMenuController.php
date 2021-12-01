<?php namespace App\Controllers;
 use App\Models\AgrupMenu;
 
class AgrupMenuController extends BaseController{
    public function index(){
        $AgrupMenu = new AgrupMenu();
        $datos=$AgrupMenu->Listar();
        $data =[
            "datos" => $datos
        ];
         return view('AgrupMenu/index',$data);
    }
    public function insertar(){
       
        $datos =[
            "NombreAgrupMenu"        => $_POST['NombreAgrupMenu'],
            "Descripcion"     => $_POST['Descripcion'],
            
           
        ];
        $AgrupMenu = new AgrupMenu();
        $respuesta= $AgrupMenu->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/AgrupMenu');

        }else{
            return redirect()->to(base_url().'/AgrupMenu');

        }
        
    }
    public function editar($id){
        $data = ["idAgrupMenu" => $id];
		$AgrupMenu = new AgrupMenu();
		$respuesta = $AgrupMenu->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('AgrupMenu/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "NombreAgrupMenu"        => $_POST['NombreAgrupMenu'],
            "Descripcion"     => $_POST['Descripcion'],
				];
		$id = $_POST['idAgrupMenu'];

		$AgrupMenu = new AgrupMenu();

		$respuesta = $AgrupMenu->actualizar($datos, $id);

		if ($respuesta) {
			return redirect()->to(base_url().'/AgrupMenu');
		} else {
			return redirect()->to(base_url().'/AgrupMenu');
		}
	}
}

?>