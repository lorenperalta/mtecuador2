<?php

namespace App\Controllers;

use App\Models\NosotrosModel;

class NosotrosController extends BaseController
{
    public function index()
    {
        $nosotros = new NosotrosModel();
        $data = $nosotros->listar();
        $datas = [
            "datos" => $data,
        ];
        return view('Nosotros/index', $datas);
    }

    public function actualizar()
    {

        $datos = [
            "historia" => $_POST['historia'],
            "mision" => $_POST['mision'],
            "vision" => $_POST['vision'],
            "valores" => $_POST['valores'],
            "objetivos" => $_POST['objetivos'],
            "filosofia" => $_POST['filosofia'],
        ];

        $idNosotros = 1;
        $nosotros = new NosotrosModel();
        $nosotros->actualizar($datos, $idNosotros);
    }

    public function obtener($idNosotros)
    {
        $data = ["idNosotros" => $idNosotros];
        $nosotros = new NosotrosModel();
        $res = $nosotros->obtener($data);

        $datos = ["datos" => $res];

        return view('Nosotros/actualizar', $datos);
    }
}
