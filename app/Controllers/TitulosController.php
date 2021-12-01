<?php

namespace App\Controllers;

use App\Models\TitulosModel;
use App\Models\Libro;
use App\Models\Leyes;

class TitulosController extends BaseController
{

    public function index()
    {
        $titulos = new TitulosModel();
        $datos = $titulos->listar();
        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];
        return view('Administrador/Titulos/index', $data);
    }

    public function indexLibro($idLibro)
    {
        $titulos = new TitulosModel();
        $datos = $titulos->ListarTitulos($idLibro);

        $Libro = new Libro();
        $datab = ["idLibro" => $idLibro];
        $dbLibro = $Libro->ObtenerbyId($datab);

        $ley = new Leyes();
        $datalb = ["idLey" => $dbLibro[0]['idLey']];
        $dbLey = $ley->ObtenerbyId($datalb);

        $mensaje = session('mensaje');

        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje,
            "idLibrore" => $idLibro,
            "dbLibros" => $dbLibro,
            "dbLeyes" => $dbLey,
        ];
        return view('Administrador/Titulos/index', $data);
    }

    public function crear()
    {
        $monstrarnoTitulo = (isset($_POST['mostrar_NoTitulo'])) ? 1 : 0;
        $mostrarnombTitulo = (isset($_POST['mostrar_NombreTitulo'])) ? 1 : 0;
        $datos = [
            "NoTitulo" => $_POST['NoTitulo'],
            "mostrar_NoTitulo" => $monstrarnoTitulo,
            "NombreTitulo" => $_POST['NombreTitulo'],
            "mostrar_NombreTitulo" => $mostrarnombTitulo,
            "idLibro" => $_POST['idLibro'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $titulos = new TitulosModel();
        $respuesta = $titulos->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url() . '/Administrador/Titulos/' . $_POST['idLibro'])->with('mensaje', '1');
        } else {
            return redirect()->to(base_url() . '/Administrador/Titulos/' . $_POST['idLibro'])->with('mensaje', '0');
        }
    }

    public function actualizar()
    {

        $datos = [
            "NoTitulo" => $_POST['NoTitulo'],
            "mostrar_NoTitulo" => $_POST['mostrar_NoTitulo'],
            "NombreTitulo" => $_POST['NombreTitulo'],
            "mostrar_NombreTitulo" => $_POST['mostrar_NombreTitulo'],
            "idLibro" => $_POST['idLibro'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,
        ];

        $titulo = new TitulosModel();
        $idTitulo = $_POST['idTitulo'];
        $respuesta = $titulo->actualizar($datos, $idTitulo);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Administrador/Titulos/' . $_POST['idLibro'])->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/Administrador/Titulos/' . $_POST['idLibro'])->with('mensaje', '3');
        }
    }

    public function obtener($idTitulo)
    {
        $data = ["idTitulo" => $idTitulo];
        $titulos = new TitulosModel();
        $respuesta = $titulos->Obtenerdatos($data);

        $datos = ["datos" => $respuesta];

        return view('Administrador/Titulos/actualizar', $datos);
    }

    public function eliminar($idTitulo)
    {
        $titulo = new TitulosModel();
        $data = ["idTitulo" => $idTitulo];

        $respuesta = $titulo->eliminar($data);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Administrador/Titulos/' . $_POST['idLibro'])->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/Administrador/Titulos/' . $_POST['idLibro'])->with('mensaje', '5');
        }
    }
}
