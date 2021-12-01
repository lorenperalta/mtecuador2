<?php

namespace App\Controllers;

use App\Models\Capitulo;
use App\Models\TitulosModel;
use App\Models\Libro;
use App\Models\Leyes;

class CapituloController extends BaseController
{
    public function index()
    {
        $Capitulo = new Capitulo();
        $datos = $Capitulo->Listar();
        $data = [
            "datos" => $datos
        ];
        return view('Administrador/Capitulo/index', $data);
    }
    public function indexCap($idTitulo)
    {
        $Capitulo = new Capitulo();
        $datos = $Capitulo->Listar($idTitulo);
        // consulta TItulos
        $titulos = new TitulosModel();
        $dataTi = ["idTitulo" => $idTitulo];
        $dbTitulo = $titulos->obtenerDatos($dataTi);
        // consulta Libros COn  titulo Obtenido
        $Libros = new Libro();
        $datali = ["idLibro" => $dbTitulo[0]['idLibro']];
        $dbLibros = $Libros->ObtenerbyId($datali);
        // consulta leyes
        $ley = new Leyes();
        $datalb = ["idLey" => $dbLibros[0]['idLey']];
        $dbLey = $ley->ObtenerbyId($datalb);

        $data = [
            "datos" => $datos,
            "idTitu" => $idTitulo,
            "dbtitu" => $dbTitulo,
            "dblib" => $dbLibros,
            "dbley" => $dbLey,
        ];
        return view('Administrador/Capitulo/index', $data);
    }

    public function insertar()
    {
        $monstrarnoCapitulo = (isset($_POST['mostrar_NoCapitulo'])) ? 1 : 0;
        $mostrarnombCapitulo = (isset($_POST['mostrar_NombreCapitulo'])) ? 1 : 0;
        $datos = [
            "NoCapitulo"        => $_POST['NoCapitulo'],
            "mostrar_NoCapitulo"     => $monstrarnoCapitulo,
            "NombreCapitulo"     => $_POST['NombreCapitulo'],
            "mostrar_NombreCapitulo"       => $mostrarnombCapitulo,
            "idTitulo"      => $_POST['idTitulo'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,

        ];
        $Capitulo = new Capitulo();
        $respuesta = $Capitulo->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url() . '/Administrador/Capitulo/' . $_POST['idTitulo']);
        } else {
            return redirect()->to(base_url() . '/Administrador/Capitulo/' . $_POST['idTitulo']);
        }
    }
    public function editar($id)
    {
        $data = ["idCapitulo" => $id];
        $Capitulo = new Capitulo();
        $respuesta = $Capitulo->ObtenerbyId($data);

        $datos = ["datos" => $respuesta];

        return view('Capitulo/editar', $datos);
    }
    public function actualizar()
    {
        $datos = [
            "NoCapitulo"        => $_POST['NoCapitulo'],
            "mostrar_NoCapitulo"     => $_POST['mostrar_NoCapitulo'],
            "NombreCapitulo"     => $_POST['NombreCapitulo'],
            "mostrar_NombreCapitulo"       => $_POST['mostrar_NombreCapitulo'],
            "idTitulo"      => $_POST['idTitulo'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
        ];
        $id = $_POST['idCapitulo'];

        $Capitulo = new Capitulo();

        $respuesta = $Capitulo->actualizar($datos, $id);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Administrador/Capitulo/' . $_POST['idTitulo']);
        } else {
            return redirect()->to(base_url() . '/Administrador/Capitulo/' . $_POST['idTitulo']);
        }
    }
}
