<?php namespace App\Controllers;
 use App\Models\Categoria;
 
class CategoriaController extends BaseController{
    public function index(){
        $Categoria = new Categoria();
        $datos=$Categoria->Listar();
        $data =[
            "datos" => $datos
        ];
         return view('Categoria/index',$data);
    }
    public function insertar(){
       
        $datos =[
            "NombreCategoria"     => $_POST['NombreCategoria'],
            "DescripcionCategoria"     => $_POST['DescripcionCategoria'],
            "Borrado"       => 1,
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
           
        ];
        $Categoria = new Categoria();
        $respuesta= $Categoria->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Categoria');

        }else{
            return redirect()->to(base_url().'/Categoria');

        }
        
    }
    public function editar($id){
        $data = ["idCategoria" => $id];
		$Categoria = new Categoria();
		$respuesta = $Categoria->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('Categoria/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "NombreCategoria"     => $_POST['NombreCategoria'],
            "DescripcionCategoria"       => $_POST['DescripcionCategoria'],
            "Borrado"      => $_POST['Borrado'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
				];
		$id = $_POST['idCategoria'];

		$Categoria = new Categoria();

		$respuesta = $Categoria->actualizar($datos, $id);

		if ($respuesta) {
			return redirect()->to(base_url().'/Categoria');
		} else {
			return redirect()->to(base_url().'/Categoria');
		}
	}
}

?>