<?php namespace App\Controllers;
 use App\Models\Agrupamiento;

class AgrupamientoController extends BaseController{

    public function index(){
        $Agrupamiento = new Agrupamiento();
        $datos=$Agrupamiento->Listar();
        $mensaje = session('mensaje');

        $data =[
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
         return view('Administrador/Agrupamiento/index',$data);
    }

    public function servicios(){
        $Agrupamiento = new Agrupamiento();
        $datos=$Agrupamiento->Listar();
        $mensaje = session('mensaje');

        $data =[
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
         return view('Clientes/Servicios/servicios',$data);
    }

    public function insertar(){
       
        $datos =[
            "NombreAgrupamiento"     => $_POST['NombreAgrupamiento'],
            "DescripcionAgrupamiento"     => $_POST['DescripcionAgrupamiento'],
            "TipoAgrup"     => $_POST['TipoAgrup'],
            "idUsuarioCreo"       => 1,
            "idUsuarioMod"       => 1,
            "Borrado"       => 0,
            "Precio"       => $_POST['Precio'],
            "Imagen"       => $_POST['Imagen'],
        ];
        // $file = $this -> request ->getFile('Imagen');
        // $file->move('uploads');

        $Agrupamiento = new Agrupamiento();
        $respuesta= $Agrupamiento->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Agrupamiento');
        }else{
            return redirect()->to(base_url().'/Agrupamiento');
        }
        
    }

    public function editar($id){
        $data = ["idAgrupamiento" => $id];
		$Agrupamiento = new Agrupamiento();
		$respuesta = $Agrupamiento->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('Administrador/Agrupamiento/editar', $datos);
    }

    public function actualizar(){
		$datos =[
            "NombreAgrupamiento"     => $_POST['NombreAgrupamiento'],
            "DescripcionAgrupamiento"     => $_POST['DescripcionAgrupamiento'],
            "TipoAgrup"     => $_POST['TipoAgrup'],
            "idUsuarioCreo"       => 1,
            "idUsuarioMod"       => 1,
            "Borrado"       => 0,
            "Precio"       => $_POST['Precio'],
            "Imagen"       => $_POST['Imagen'],
                      
        ];
		$id = $_POST['idAgrupamiento'];

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