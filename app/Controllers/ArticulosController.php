<?php namespace App\Controllers;

use App\Models\ArticulosModel;
use App\Models\ParagrafosModel;
use App\Models\Seccion;
 use App\Models\Capitulo;
 use App\Models\TitulosModel;
 use App\Models\Libro;
 use App\Models\Leyes;

class ArticulosController extends BaseController {
    
    public function index(){
        $articulos = new ArticulosModel();
        $datos = $articulos->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Articulos/index', $data);
    }
    public function indexArt($idParagrafo){
        $articulos = new ArticulosModel();
        $datos = $articulos->listar($idParagrafo);
        $mensaje = session('mensaje');

        $paragrafos = new ParagrafosModel();
        $dbparagra =  ["idParagrafo" => $idParagrafo];
        $datospara = $paragrafos->obtenerDatos($dbparagra);
       
        // consulta Seccion
        $Seccion = new Seccion();
        $dbse  = ["idSeccion" => $datospara[0]['idSeccion']];
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
            "dbpara"=>$datospara,
            "datosec" => $datosec,
            "datosCap" => $dbCapitulo,
            "ideParagrafo" => $idParagrafo,
            "dbtitu" => $dbTitulo,
            "dblib" => $dbLibros,
            "dbley" => $dbLey,
            "dbCapi" => $dbCapitulo,
        ];
        return view('Administrador/Articulos/index', $data);
    }
    
    public function crear(){
        $datos = [
            "noArticulo" => $_POST['noArticulo'],
            "ContenidoArticulo" => $_POST['ContenidoArticulo'],
            "idParagrafo" => $_POST['idParagrafo'],
            "idRomano" => $_POST['idRomano'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $articulos = new ArticulosModel();
        $respuesta = $articulos->insertar($datos);

        if ($respuesta > 0) {
			return redirect()->to(base_url().'/Articulos/'.$_POST['idParagrafo'])->with('mensaje','1');
		} else {
			return redirect()->to(base_url().'/Articulos/'.$_POST['idParagrafo'])->with('mensaje','0');
		}
    }

    public function actualizar(){
        $datos = [
            "noArticulo" => $_POST['noArticulo'],
            "ContenidoArticulo" => $_POST['ContenidoArticulo'],
            "idParagrafo" => $_POST['idParagrafo'],
            "idRomano" => $_POST['idRomano'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];
        
        $articulos = new ArticulosModel();
        $idArticulos = $_POST['idArticulo'];
        $respuesta = $articulos->actualizar($datos, $idArticulos);

        if ($respuesta) {
            return redirect()->to(base_url().'/Articulos/'.$_POST['idParagrafo'])->with('mensaje','2');
        } else {
            return redirect()->to(base_url().'/Articulos/'.$_POST['idParagrafo'])->with('mensaje','3');
        }
    }

    public function obtener($idArticulo){
        $data = ["idArticulo" => $idArticulo];
		$articulos = new ArticulosModel();
		$respuesta = $articulos->obtenerDatos($data);

		$datos = ["datos" => $respuesta];

		return view('Articulos/actualizar', $datos);
    }

    public function eliminar($idArticulo){
        $articulos = new ArticulosModel();
		$data = ["idArticulo" => $idArticulo];

		$respuesta = $articulos->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/Articulos')->with('mensaje','4');
		} else {
			return redirect()->to(base_url().'/Articulos')->with('mensaje','5');
		}
    }
}

?>