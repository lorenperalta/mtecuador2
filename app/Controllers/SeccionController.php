<?php namespace App\Controllers;
 use App\Models\Seccion;
 use App\Models\Capitulo;
 use App\Models\TitulosModel;
 use App\Models\Libro;
 use App\Models\Leyes;
 
class SeccionController extends BaseController{
    public function index(){
        $Seccion = new Seccion();
        $datos=$Seccion->Listar();
        $data =[
            "datos" => $datos
        ];
         return view('Administrador/Seccion/index',$data);
    }
    public function indexSec($idCapitulo){
        $Seccion = new Seccion();
        $datosec=$Seccion->Listar($idCapitulo);
        // consulta Capitulos
        $Capitulos = new Capitulo();
        $dataCap = ["idCapitulo" => $idCapitulo];
        $dbCapitulo = $Capitulos->ObtenerbyId($dataCap);

        // consulta TItulos
        $titulos = new TitulosModel();
        $dataTi = ["idTitulo" => $dbCapitulo[0]['idTitulo']];
        $dbTitulo = $titulos->obtenerDatos($dataTi);
        // consulta Libros COn  titulo Obtenido
        $Libros = new Libro();
        $datali = ["idLibro" => $dbTitulo[0]['idLibro']];
        $dbLibros = $Libros->ObtenerbyId($datali);
        // consulta leyes
        $ley= new Leyes();
        $datalb =["idLey" => $dbLibros[0]['idLey']];
        $dbLey=$ley->ObtenerbyId($datalb);
       

        $data =[
            "datos" => $datosec,
            "datosCap" => $dbCapitulo,
            "idcap" => $idCapitulo,
            "dbtitu" => $dbTitulo,
            "dblib" => $dbLibros,
            "dbley" => $dbLey,
            "dbCapi" => $dbCapitulo,
            
        ];
         return view('Administrador/Seccion/index',$data);
    }
    public function insertar(){
        $monstrarnoSeccion = (isset($_POST['mostrar_NoSeccion'])) ? 1 : 0;
        $mostrarnombSeccion = (isset($_POST['mostrar_NombreSeccion'])) ? 1 : 0;
        $datos =[
            "NoSeccion"        => $_POST['NoSeccion'],
            "mostrar_NoSeccion"     => $monstrarnoSeccion,
            "NombreSeccion"     => $_POST['NombreSeccion'],
            "mostrar_NombreSeccion"       => $mostrarnombSeccion,
            "idCapitulo"      => $_POST['idCapitulo'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
           
        ];
        $Seccion = new Seccion();
        $respuesta= $Seccion->insertar($datos);
        
        if($respuesta>0){
            return redirect()->to(base_url().'/Administrador/Seccion/'.$_POST['idCapitulo']);

        }else{
            return redirect()->to(base_url().'/Administrador/Seccion/'.$_POST['idCapitulo']);

        }
        
    }
    public function editar($id){
        $data = ["idSeccion" => $id];
		$Seccion = new Seccion();
		$respuesta = $Seccion->ObtenerbyId($data);

		$datos = ["datos" => $respuesta];

		return view('Administrador/Seccion/editar', $datos);
    }
    public function actualizar(){
		$datos = [
            "NoSeccion"        => $_POST['NoSeccion'],
            "mostrar_NoSeccion"     => $_POST['mostrar_NoSeccion'],
            "NombreSeccion"     => $_POST['NombreSeccion'],
            "mostrar_NombreSeccion"       => $_POST['mostrar_NombreSeccion'],
            "idCapitulo"      => $_POST['idCapitulo'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
				];
		$id = $_POST['idSeccion'];

		$Seccion = new Seccion();

		$respuesta = $Seccion->actualizar($datos, $id);

		if ($respuesta) {
            return redirect()->to(base_url().'/Administrador/Seccion/'.$_POST['idCapitulo']);
			
		} else {
            return redirect()->to(base_url().'/Administrador/Seccion/'.$_POST['idCapitulo']);

		}
	}
}
