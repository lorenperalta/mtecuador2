<?php

namespace App\Controllers;

use App\Models\DiccionarioModel;

class DiccionarioController extends BaseController
{
    public function index()
    {
        $diccionario = new DiccionarioModel();
        $datos = $diccionario->listar();

        $data = [
            "datos" => $datos,
        ];
        return view('Diccionario/index', $data);
    }

    public function crear()
    {
        $datos = [
            "palabra" => $_POST['palabra'],
            "significado" => $_POST['significado'],
        ];

        $diccionario = new DiccionarioModel();
        $respuesta = $diccionario->insertar($datos);

        if ($respuesta > 0) {
            return redirect()->to(base_url() . '/Diccionario')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url() . '/Diccionario')->with('mensaje', '0');
        }
    }

    public function actualizar()
    {

        $datos = [
            "palabra" => $_POST['palabra'],
            "significado" => $_POST['significado'],
        ];

        $diccionario = new DiccionarioModel();
        $idDiccionario = $_POST['idpalabra'];
        $diccionario->actualizar($datos, $idDiccionario);
    }

    public function obtener($idDiccionario)
    {
        $data = ["idpalabra" => $idDiccionario];
        $diccionario = new DiccionarioModel();
        $respuesta = $diccionario->obtener($data);

        $datos = ["datos" => $respuesta];

        return view('Diccionario/actualizar', $datos);
    }

    public function eliminar($idDiccionario)
    {
        $diccionario = new DiccionarioModel();
        $data = ["idpalabra" => $idDiccionario];

        $diccionario->eliminar($data);
    }
}
