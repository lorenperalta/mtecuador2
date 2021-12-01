<?php namespace App\Controllers;
 use App\Models\Romano;
 
class RomanoController extends BaseController{
    public function index(){
        $Romano = new Romano();
        $datos=$Romano->Listar();
        $data =[
            "datos" => $datos
        ];
         return view('Romano/index',$data);
    }
    public function insertar(){
       
        $datos =[
            "NoRomano"        => $_POST['NoRomano'],
            "mostrar_NoRomano"     => 1,
            "NombreRomano"     => $_POST['NombreRomano'],
            "mostrar_NombreRomano"       => 1,
            "idParagrafo"      => $_POST['idParagrafo'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
           
        ];
        $Romano = new Romano();
        $respuesta= $Romano->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Romano');

        }else{
            return redirect()->to(base_url().'/Romano');

        }
        
    }
    public function editar($id){
        $data = ["idRomano" => $id];
		$Romano = new Romano();
		$respuesta = $Romano->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('Romano/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "NoRomano"        => $_POST['NoRomano'],
            "mostrar_NoRomano"     => $_POST['mostrar_NoRomano'],
            "NombreRomano"     => $_POST['NombreRomano'],
            "mostrar_NombreRomano"       => $_POST['mostrar_NombreRomano'],
            "idParagrafo"      => $_POST['idParagrafo'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
				];
		$id = $_POST['idRomano'];

		$Romano = new Romano();

		$respuesta = $Romano->actualizar($datos, $id);

		if ($respuesta) {
			return redirect()->to(base_url().'/Romano');
		} else {
			return redirect()->to(base_url().'/Romano');
		}
	}
}

?>