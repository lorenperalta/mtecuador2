<?php

namespace App\Controllers;

use App\Models\FavoritosModel;

class FavoritosController extends BaseController
{
    public function index()
    {
        return view('Cliente/Favoritos/index');
    }

    public function crear()
    {
        $datos = [
            "palabra" => $_POST['palabra'],
            "significado" => $_POST['significado'],
        ];

        $diccionario = new FavoritosModel();
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

        $diccionario = new FavoritosModel();
        $idDiccionario = $_POST['idpalabra'];
        $diccionario->actualizar($datos, $idDiccionario);
    }

    public function obtener($idDiccionario)
    {
        $data = ["idpalabra" => $idDiccionario];
        $diccionario = new FavoritosModel();
        $respuesta = $diccionario->obtener($data);

        $datos = ["datos" => $respuesta];

        return view('Diccionario/actualizar', $datos);
    }

    public function eliminar($idDiccionario)
    {
        $diccionario = new FavoritosModel();
        $data = ["idpalabra" => $idDiccionario];

        $diccionario->eliminar($data);
    }
}
