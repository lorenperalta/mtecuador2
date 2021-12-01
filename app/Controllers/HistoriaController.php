<?php

namespace App\Controllers;

use App\Models\NosotrosModel;

class HistoriaController extends BaseController
{
    public function index()
    {
        $nosotros = new NosotrosModel();
        $data = $nosotros->listar();
        $datas = [
            "datos" => $data,
        ];
        return view('Historia/index', $datas);
    }
}
