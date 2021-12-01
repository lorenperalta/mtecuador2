<?php namespace App\Controllers;
 use App\Models\Agrupamiento;
class AgrupamientoController extends BaseController{
    public function index(){
        $Agrupamiento = new Agrupamiento();
        $datos=$Agrupamiento->Listar();
        $data =[
            "datos" => $datos
        ];
         return view('Agrupamiento/index',$data);
    }
    public function insertar(){
       
        $datos =[
            "id_usuario"        => 1,
            "Nombre"     => $_POST['Nombre'],
            "Descripcion"     => $_POST['Descripcion'],
            "Precio"       => $_POST['Precio'],
                      
        ];
        $Agrupamiento = new Agrupamiento();
        $respuesta= $Agrupamiento->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Agrupamiento');

        }else{
            return redirect()->to(base_url().'/Agrupamiento');

        }
        
    }
    public function editar($id){
        $data = ["id" => $id];
		$Agrupamiento = new Agrupamiento();
		$respuesta = $Agrupamiento->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('Agrupamiento/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "id_usuario"        => 1,
            "Nombre"     => $_POST['Nombre'],
            "Descripcion"     => $_POST['Descripcion'],
            "Precio"       => $_POST['Precio'],
				];
		$id = $_POST['id'];

		$Agrupamiento = new Agrupamiento();

		$respuesta = $Agrupamiento->actualizar($datos, $id);

		if ($respuesta) {
			return redirect()->to(base_url().'/Agrupamiento')->with('mensaje','2');
		} else {
			return redirect()->to(base_url().'/Agrupamiento')->with('mensaje','3');
		}
	}
}

?>