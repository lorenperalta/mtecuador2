<?php namespace App\Controllers;
 use App\Models\Funcion;
 
class FuncionController extends BaseController{
    public function index(){
        $Funcion = new Funcion();
        $datos=$Funcion->Listar();
        $data =[
            "datos" => $datos
        ];
         return view('Funcion/index',$data);
    }
    public function insertar(){
       
        $datos =[
            "NombreFuncion"     => $_POST['NombreFuncion'],
            "DescripcionFuncion"     => $_POST['DescripcionFuncion'],
            "Borrado"       => 1,
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
           
        ];
        $Funcion = new Funcion();
        $respuesta= $Funcion->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Funcion');

        }else{
            return redirect()->to(base_url().'/Funcion');

        }
        
    }
    public function editar($id){
        $data = ["idFuncion" => $id];
		$Funcion = new Funcion();
		$respuesta = $Funcion->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('Funcion/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "NombreFuncion"     => $_POST['NombreFuncion'],
            "DescripcionFuncion"       => $_POST['DescripcionFuncion'],
            "Borrado"      => $_POST['Borrado'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
				];
		$id = $_POST['idFuncion'];

		$Funcion = new Funcion();

		$respuesta = $Funcion->actualizar($datos, $id);

		if ($respuesta) {
			return redirect()->to(base_url().'/Funcion');
		} else {
			return redirect()->to(base_url().'/Funcion');
		}
	}
}

?>