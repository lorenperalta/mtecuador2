<?php namespace App\Controllers;

use App\Models\ParagrafosModel;
use App\Models\Seccion;
 use App\Models\Capitulo;
 use App\Models\TitulosModel;
 use App\Models\Libro;
 use App\Models\Leyes;

class ParagrafosController extends BaseController {
    
    public function index(){
        $paragrafos = new ParagrafosModel();
        $datos = $paragrafos->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Administrador/Paragrafos/index', $data);
    }
    public function indexPara($idSeccion){
        $paragrafos = new ParagrafosModel();
        $datos = $paragrafos->listar($idSeccion);
        $mensaje = session('Administrador/mensaje');

        // consulta Seccion
        $Seccion = new Seccion();
        $dbse  = ["idSeccion" => $idSeccion];
        $datosec=$Seccion->ObtenerbyId($dbse);
        // consulta Capitulos
        $Capitulos = new Capitulo();
        $dataCap = ["idCapitulo" => $datosec[0]['idCapitulo']];
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
        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje,
            "datosec" => $datosec,
            "datosCap" => $dbCapitulo,
            "idSecc" => $idSeccion,
            "dbtitu" => $dbTitulo,
            "dblib" => $dbLibros,
            "dbley" => $dbLey,
            "dbCapi" => $dbCapitulo,
        ];
        return view('Administrador/Paragrafos/index', $data);
    }
    
    public function crear(){
        $monstrarnoParagrafo = (isset($_POST['mostrar_NoParagrafo'])) ? 1 : 0;
        $mostrarnombParagrafo = (isset($_POST['mostrar_NombreParagrafo'])) ? 1 : 0;
        $datos = [
            "NoParagrafo" => $_POST['NoParagrafo'],
            "mostrar_NoParagrafo" => $monstrarnoParagrafo,
            "NombreParagrafo" => $_POST['NombreParagrafo'],
            "mostrar_NombreParagrafo" => $mostrarnombParagrafo,
            "idSeccion" => $_POST['idSeccion'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $paragrafos = new ParagrafosModel();
        $respuesta = $paragrafos->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Paragrafos/'.$_POST['idSeccion'])->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Paragrafos/'.$_POST['idSeccion'])->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "NoParagrafo" => $_POST['NoParagrafo'],
            "mostrar_NoParagrafo" => 1,
            "NombreParagrafo" => $_POST['NombreParagrafo'],
            "mostrar_NombreParagrafo" => 1,
            "idSeccion" => $_POST['idSeccion'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];
        
        $paragrafos = new ParagrafosModel();
        $idParagrafo = $_POST['idParagrafo'];
        $respuesta = $paragrafos->actualizar($datos, $idParagrafo);

        if ($respuesta) {
            return redirect()->to(base_url().'/Paragrafos/'.$_POST['idSeccion'])->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Paragrafos/'.$_POST['idSeccion'])->with('mensaje','3');
        }
    }

    public function obtener($idParagrafo){
        $data = ["idParagrafo" => $idParagrafo];
		$paragrafos = new ParagrafosModel();
		$respuesta = $paragrafos->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('Paragrafos/actualizar', $datos);
    }

    public function eliminar($idParagrafo){
        $paragrafos = new ParagrafosModel();
		$data = ["idParagrafo" => $idParagrafo];

		$respuesta = $paragrafos->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Paragrafos')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Paragrafos')->with('mensaje','5');
		}
    }
}
