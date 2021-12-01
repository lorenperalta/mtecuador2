<?php

namespace App\Controllers;

use App\Models\Libro;
use App\Models\Leyes;

class LibroController extends BaseController
{
    public function index()
    {
        $Libro = new Libro();

        $datos = $Libro->Listar();
        $data = [
            "datos" => $datos
        ];
        return view('Libro/index', $data);
    }

    public function indexley($idLey)
    {
        $Libro = new Libro();
        $Ley = new Leyes();

        $Consulta = ["idLey" => $idLey];
        $DbLey = $Ley->ObtenerbyId($Consulta);

        $datos = $Libro->ListarbyId($idLey);

        $data = [
            "datos" => $datos,
            "idLeye" => $idLey,
            "dbLeyes" => $DbLey,
        ];
        return view('Administrador/Libro/index', $data);
    }


    public function insertar()
    {
        $monstrarnoLibro = (isset($_POST['mostrar_NoLibro'])) ? 1 : 0;
        $mostrarnombLibro = (isset($_POST['mostrar_NombreLibro'])) ? 1 : 0;
        $datos = [
            "NoLibro"        => $_POST['NoLibro'],
            "mostrar_NoLibro"     => $monstrarnoLibro,
            "NombreLibro"     => $_POST['NombreLibro'],
            "mostrar_NombreLibro" => $mostrarnombLibro,
            "idLey"      => $_POST['idLey'],
            "idUsuarioCreo" => 1,
            "idUsuarioMod" => 1,

        ];
        $Libro = new Libro();
        $respuesta = $Libro->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url() . '/Administrador/Leyes/editar/' . $_POST['idLey']);
        } else {
            return redirect()->to(base_url() . '/Administrador/Leyes/editar/' . $_POST['idLey']);
        }
    }
    public function editar($id)
    {
        $data = ["idLibro" => $id];
        $Libro = new Libro();
        $respuesta = $Libro->ObtenerbyId($data);

        $datos = ["datos" => $respuesta];

        return view('Administrador/Libro/editar', $datos);
    }
    public function actualizar()
    {
        $datos = [
            "NoLibro"        => $_POST['NoLibro'],
            "mostrar_NoLibro"     => $_POST['mostrar_NoLibro'],
            "NombreLibro"     => $_POST['NombreLibro'],
            "mostrar_NombreLibro"       => $_POST['mostrar_NombreLibro'],
            "idLey"      => $_POST['idLey'],
            "idUsuarioCreo"          => 1,
            "idUsuarioMod"          => 1,
        ];
        $id = $_POST['idLibro'];

        $Libro = new Libro();

        $respuesta = $Libro->actualizar($datos, $id);

        if ($respuesta) {
            return redirect()->to(base_url() . '/Administrador/Leyes/editar/' . $_POST['idLey']);
        } else {
            return redirect()->to(base_url() . '/Administrador/Leyes/editar/' . $_POST['idLey']);
        }
    }
}
